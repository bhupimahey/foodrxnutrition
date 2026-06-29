(function () {
	"use strict";

	var consentKey = "foodrx_cookie_accept_all";
	var consentCookieName = "cookieyes-consent";
	var oneYearDays = 365;

	function getCookie(name) {
		var needle = name + "=";
		var parts = document.cookie ? document.cookie.split(";") : [];

		for (var i = 0; i < parts.length; i++) {
			var part = parts[i].trim();

			if (part.indexOf(needle) === 0) {
				return part.substring(needle.length);
			}
		}

		return "";
	}

	function setCookie(name, value, days) {
		var expires = "";

		if (days > 0) {
			var date = new Date();
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
			expires = "; expires=" + date.toUTCString();
		}

		document.cookie = name + "=" + value + expires + "; path=/; SameSite=Lax";
	}

	function hasAcceptedConsent() {
		var cookieValue = getCookie(consentCookieName);
		return cookieValue.indexOf("consent:yes") !== -1 || cookieValue.indexOf("action:yes") !== -1;
	}

	function storeAcceptedState() {
		try {
			window.localStorage.setItem(consentKey, "1");
		} catch (error) {
			/* no-op */
		}

		if (!hasAcceptedConsent()) {
			setCookie(
				consentCookieName,
				"consent:yes,action:yes,necessary:yes,functional:yes,analytics:yes,performance:yes,advertisement:yes",
				oneYearDays
			);
		}
	}

	function shouldSuppressBanner() {
		if (hasAcceptedConsent()) {
			return true;
		}

		try {
			return window.localStorage.getItem(consentKey) === "1";
		} catch (error) {
			return false;
		}
	}

	function hideBanner() {
		var selectors = [
			".cky-consent-container",
			".cky-modal",
			".cky-overlay"
		];

		for (var i = 0; i < selectors.length; i++) {
			var nodes = document.querySelectorAll(selectors[i]);
			for (var j = 0; j < nodes.length; j++) {
				nodes[j].classList.add("cky-hide");
				nodes[j].style.display = "none";
				nodes[j].setAttribute("aria-hidden", "true");
			}
		}
	}

	function handleClick(event) {
		var target = event.target;

		if (!target || typeof target.closest !== "function") {
			return;
		}

		var acceptButton = target.closest(
			"[data-cky-tag='accept-button'], [data-cky-tag='detail-accept-button'], .cky-btn-accept"
		);

		if (!acceptButton) {
			return;
		}

		storeAcceptedState();
	}

	function initObserver() {
		if (typeof MutationObserver === "undefined") {
			return;
		}

		var observer = new MutationObserver(function () {
			if (shouldSuppressBanner()) {
				hideBanner();
			}
		});

		observer.observe(document.documentElement, {
			childList: true,
			subtree: true
		});
	}

	function init() {
		document.addEventListener("click", handleClick, true);

		if (shouldSuppressBanner()) {
			storeAcceptedState();
			hideBanner();
		}

		initObserver();
	}

	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", init);
	} else {
		init();
	}
})();
