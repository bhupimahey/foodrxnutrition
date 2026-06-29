# Food Rx Site Setup Guide

Complete the client website on WordPress using the theme templates and content added to this repository.

## What was added to the theme

| File | Purpose |
|------|---------|
| `page-foodrx-home.php` | Home page with vision, mission, about, specialties |
| `page-foodrx-services.php` | All services and pricing from client brief |
| `page-foodrx-faq.php` | FAQ accordion |
| `page-foodrx-contact.php` | Contact page + CF7 form |
| `page-foodrx-nutrition-hub.php` | Blog + recipes listing |
| `page-foodrx-legal.php` | Terms or Privacy (based on page slug) |
| `inc/foodrx/` | All page content (editable in PHP) |
| `assets/css/foodrx-pages.css` | Page styling |
| `content/contact-form-7.txt` | Contact form to import |

## Step 1 — Deploy theme to cPanel

1. GitHub → **Actions** → **Deploy to cPanel Production** → **Run workflow**

Or pull latest theme files to production via your usual method.

On the first visit after deploy, the theme automatically updates the **primary menu links** only. It does **not** replace the CMSMasters homepage layout.

To run manually: **WP Admin → Tools → Food Rx Setup**.

## Step 2 — Create WordPress pages (optional)

Food Rx pages for Services, FAQ, Contact, and Nutrition Hub are created automatically when the menu is set up. You only need manual steps if you prefer to configure pages yourself:

In **Pages → Add New**, create each page with the exact slug and template:

| Page title | Slug | Template |
|------------|------|----------|
| Home | keep existing CMSMasters homepage | *(default — do not switch to Food Rx — Home)* |
| Services | `services` | **Food Rx — Services** |
| Nutrition Hub | `nutrition-hub` | **Food Rx — Nutrition Hub** |
| FAQ | `faq` | **Food Rx — FAQ** |
| Contact | `contact` | **Food Rx — Contact** |
| Terms & Conditions | `terms-and-conditions` | **Food Rx — Legal Page** |
| Privacy Policy | `privacy-policy` | **Food Rx — Legal Page** |

**Page settings (each page):**
- Layout: **Full Width** (Theme Options on page edit screen)
- Disable default page heading if you prefer the template hero only

## Step 3 — Set homepage and reading settings

Keep the existing CMSMasters homepage as the static front page.

**Settings → Reading:**
- **Your homepage displays:** A static page
- **Homepage:** your existing Home page (CMSMasters demo layout)
- **Posts page:** Nutrition Hub (optional)

## Step 4 — Create navigation menu

The deploy auto-setup assigns **Primary Navigation** to:

- Home → `/`
- Services → `/services/`
- Nutrition Hub → `/nutrition-hub/`
- FAQ → `/faq/`
- Contact → `/contact/`

To change links manually: **Appearance → Menus**.

**Footer menu** (optional):
- Terms & Conditions
- Privacy Policy

Assign to **Footer Navigation**.

**Settings → Privacy:** set Privacy Policy page to the Privacy Policy page you created.

## Step 5 — Contact Form 7

1. Install **Contact Form 7** plugin
2. **Contact → Add New**
3. Title: `Food Rx Contact`
4. Paste form markup from `content/contact-form-7.txt`
5. Set your email in the Mail tab
6. The Contact page template will auto-use this form

## Step 6 — Blog and recipes

Categories **Recipes** and **Nutrition Blog** are created automatically when the theme is activated.

1. **Posts → Add New** for blog articles (category: Nutrition Blog)
2. **Posts → Add New** for recipes (category: Recipes)
3. They appear on the Nutrition Hub page

## Step 7 — Client items still needed

Confirm with Mariam before going live:

- [ ] Contact email and phone number
- [ ] E-transfer email address
- [ ] Professional headshot / photos
- [ ] Logo (replace theme default if needed)
- [ ] Booking link (Calendly, Square Appointments, etc.) for discovery call CTA
- [ ] Legal review of Terms & Privacy placeholder text in `inc/foodrx/content.php`
- [ ] Square payment integration (if booking through site)

## Step 8 — Edit content in the future

All page copy lives in:

```
inc/foodrx/content.php
```

After editing, commit to Git and run the manual cPanel deploy workflow.

## Optional — Hide old demo pages

If the site still has CMSMasters demo pages (Classes, Kimberly, etc.):

1. **Pages → All Pages** — trash unused demo pages
2. Update menus to remove old links

## Troubleshooting

| Issue | Fix |
|-------|-----|
| Page looks unstyled | Confirm page uses a **Food Rx —** template |
| Contact form missing | Install CF7 and create form titled "Food Rx Contact" |
| FAQ accordion not opening | Theme JS must load; clear cache |
| Blog empty on Nutrition Hub | Add posts with Recipes / Nutrition Blog categories |
