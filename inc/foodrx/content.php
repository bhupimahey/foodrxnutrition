<?php
/**
 * Food Rx Nutrition — page content from client brief.
 *
 * @package Healthy Living
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * @return array<string, mixed>
 */
function foodrx_get_site_content() {
	return array(
		'brand' => 'Food Rx Nutrition Consulting Services',
		'tagline_primary' => 'Evidence-Based, Personalized Nutrition Care',
		'tagline_secondary' => 'Wellness Today, Wellbeing Tomorrow',
		'location' => 'London, Ontario, Canada',
		'contact_email' => '', // Set in WP or theme options — client doc left e-transfer blank.
	);
}

/**
 * @return array<int, array{title: string, body: string}>
 */
function foodrx_get_home_sections() {
	return array(
		array(
			'title' => 'Vision',
			'body' => 'Making nutrition the foundation of long-term, sustainable wellness — empowering individuals to eat confidently and thrive fully.',
		),
		array(
			'title' => 'Mission',
			'body' => 'Providing evidence-based, personalized nutrition care that integrates nutrition science, behavioural strategy, and compassionate support to create sustainable lifestyle change.',
		),
	);
}

/**
 * @return array<int, array{title: string, body: string}>
 */
function foodrx_get_core_values() {
	return array(
		array(
			'title' => 'Evidence-Based Care Through Food',
			'body' => 'We believe food is medicine. Our care is grounded in the latest nutrition science, research, and best practices to prescribe personalized, effective nutrition strategies that support long-term health and wellness.',
		),
		array(
			'title' => 'Personalized, Holistic, and Non-Judgmental Care',
			'body' => 'Every client is unique. We provide individualized, research-informed nutrition and lifestyle strategies in a safe, inclusive, and judgment-free environment — honoring each person\'s history, culture, goals, and lived experience.',
		),
		array(
			'title' => 'Empowerment, Access, and Continuous Growth',
			'body' => 'We empower clients to take ownership of their health through education, support, and practical tools. Through flexible scheduling, virtual access, and continuous professional growth, we remain dedicated to meeting clients where they are and evolving to better serve them.',
		),
	);
}

/**
 * @return string
 */
function foodrx_get_about_text() {
	return 'Hello, I am Mariam, your dedicated and passionate registered dietitian based in London, Ontario, Canada. I am a proud member of Dietitians of Canada and the College of Dietitians of Ontario. I am also the founder and director of Food Rx Nutrition Consulting Services.

My driving force is to help individuals understand how their daily food choices impact long-term health. There\'s nothing more rewarding than witnessing my clients achieve their health goals through carefully tailored nutrition plans. I take great joy in educating and empowering individuals to make positive lifestyle changes that lead to improved well-being. Seeing the tangible impact of my work drives me to stay current with the latest research in nutrition science and to continually work harder.

I believe that good nutrition is the foundation of a healthy life and that small, consistent changes can lead to long-term results. I have experience in several sectors including Long-Term Care, Primary Care, Nutrition Management, and Public Health. I am committed to being a lifelong learner and look forward to expanding my knowledge and skill-set.

I firmly believe that everyone\'s health matters, and I am here to equip you with the knowledge and guidance to make healthy eating a seamless part of your life. I am committed to using an evidence-based approach to nutrition counselling and strive to deliver personalized nutrition care to meet my clients\' needs. I believe in a client-centered approach, tailoring nutrition plans to meet individual needs, preferences, and cultural considerations.';
}

/**
 * @return string
 */
function foodrx_get_approach_text() {
	return 'Each of my clients is unique. I start by understanding lifestyle, eating habits, and existing food knowledge. Then I provide well-researched, personalized, and comprehensive nutrition plans. I believe that a holistic approach to health is essential, and I enjoy working with clients to optimise their overall well-being.';
}

/**
 * @return array<int, array{quote: string, author: string}>
 */
function foodrx_get_favourite_quotes() {
	return array(
		array(
			'quote' => 'Let food be thy medicine and medicine be thy food',
			'author' => 'Hippocrates',
		),
		array(
			'quote' => 'To eat is a necessity, but to eat intelligently is an art',
			'author' => 'François de La Rochefoucauld',
		),
	);
}

/**
 * @return string
 */
function foodrx_get_about_closing_text() {
	return 'When I\'m not working with clients, you can find me experimenting with tasty, yet healthy recipes, and partaking in family adventures.

I\'m your partner in this journey, offering tips, tricks, and personalised guidance to make nutritious eating an easy and enjoyable part of your life. Let\'s embark on this path to better health together.';
}

/**
 * @return string
 */
function foodrx_get_journey_intro() {
	return 'At Food Rx Nutrition Consulting Services, we are not just experts — we are your partners in health!';
}

/**
 * @return array<int, string>
 */
function foodrx_get_specialties() {
	return array(
		'Weight management (loss or gain)',
		'Chronic diseases management (high blood pressure, hyperlipidemia)',
		'Digestive and gut health (IBS, GERD, constipation, diarrhea, bloating, gas)',
		'Prediabetes or type 2 diabetes mellitus (not type 1 or complicated type 2 diabetes mellitus cases)',
		'Fatty liver',
		'Eating on a budget',
		'Emotional eating and cravings',
		'Mindful eating',
		'Healthy dietary habits and lifestyles',
		'Meal planning and cooking',
		'Grocery shopping',
		'Vegetarian or vegan diet',
		'Mental health and nutrition',
	);
}

/**
 * @return array<int, array{step: string, title: string, body: string}>
 */
function foodrx_get_journey_steps() {
	return array(
		array(
			'step' => '1',
			'title' => 'Free Discovery Video Call (30 Minutes)',
			'body' => 'This complimentary 30-minute video call is an opportunity to:

• Discuss your health goals
• Review your current challenges
• Ask questions about the nutrition process
• Determine if we are a good fit to work together

There is no obligation — just a supportive space to explore your next steps.',
		),
		array(
			'step' => '2',
			'title' => 'Choose Your Program',
			'body' => 'Select the service that fits your goals — from our 4-week Signature Program to corporate wellness, cooking classes, or grocery tours.',
		),
		array(
			'step' => '3',
			'title' => 'Personalized Nutrition Care',
			'body' => 'Receive evidence-based guidance, practical tools, and compassionate support designed for sustainable lifestyle change.',
		),
	);
}

/**
 * @return array<int, array{title: string, price: string, summary: string, details: array<int, string>}>
 */
function foodrx_get_services() {
	return array(
		array(
			'title' => 'Food Rx Signature Program',
			'price' => '$200',
			'summary' => 'The program is delivered through video conferencing for 4 weeks, 2 hours each week. The program is synchronous live sessions. There is no replay.

Over the course of 4 weeks, you will focus on foundational practices that support your overall health and well-being — no extreme changes, no deprivation, just practical strategies you can actually stick with. The aim of this in-depth program is to build sustainable habits.',
			'details' => array(
				'Simplify meal planning and prepping so healthy eating feels effortless',
				'Revamp your favourite recipes and/or discover new, healthier ones',
				'Acquire strategies for making healthier food selections when grocery shopping, at restaurants, or when ordering take-out food',
				'Wind down for better reset — improve sleep with evening routines',
				'Breathe Easy, Stress Less — reset your nervous system in under 2 minutes',
				'Start your day with simple hydration strategies',
				'Build a daily movement habit that fits your life',
				'Discover strategies for coping with cravings',
				'Healthy eating tips and strategies',
				'And more',
			),
			'outro' => 'Each week includes clear guidance, actionable strategies, and simple tips to make new habits stick. This program gives you the tools to succeed.

Who this is for: Anyone ready to prioritize their health with simple, realistic changes. No experience needed — just a willingness to show up for yourself for 4 weeks.',
		),
		array(
			'title' => 'Corporate / Workplace Wellness',
			'price' => '$100 / 2 hours (all-inclusive, no tax)',
			'summary' => 'Evidence-based nutrition education and practical solutions to cultivate a healthy and thriving workplace. Our corporate wellness programs engage your employees to take wellbeing to the next level in your workplace. Services are offered virtually across Canada.

I lead engaging, evidence-based nutrition sessions designed to create and promote a culture of wellness. Each session is tailored to your audience\'s needs and delivered in a way that is clear, interactive, and easy to apply in daily life.

Our programs are designed to both educate and empower employees with the knowledge and confidence to make sustainable, long-term healthy lifestyle changes. Ultimately, we believe that focusing on employee wellness results in increased energy, productivity, and engagement from employees.

Combines lecture-like and interactive formats with slideshow support, interesting facts, trivia, and Q&A.',
			'details' => array(
				'Healthy eating during shift work',
				'Grocery shopping the healthy way',
				'Mediterranean diet',
				'Building healthy habits',
				'Meal planning and prepping for busy schedules',
				'Heart Health 101',
				'Nutrition and stress',
				'Gut Health 101',
				'Plant-based nutrition',
				'Nutrition and immunity',
				'Custom topic ideas welcome',
			),
			'outro' => 'Incorporating workplace wellness is not just a perk — it is a strategic move that benefits both your employees and your organization. Are you ready to take your workplace wellness to the next level? Contact us today.',
		),
		array(
			'title' => 'Cooking Classes',
			'price' => '$50 / 60 minutes',
			'summary' => 'At Food Rx Nutrition Consulting Services, we offer virtual/online and in-person hands-on cooking experiences where you learn to prepare healthy and delicious recipes from the comfort of your own kitchen. Cooking classes can be offered as private or group tailored cook-along sessions with a dietitian. In both formats, you will take home helpful nutrition resources including recipes, a nutrition summary for your specific condition, a list of healthy ingredient swaps, and more.',
			'details' => array(
				'Prepare nutritious dishes that support your condition and consider your food preferences',
				'Review healthy ingredient swaps made in each recipe',
				'Discuss meal planning strategies',
				'Enjoy delicious leftovers',
				'And more',
			),
		),
		array(
			'title' => 'Grocery Tours',
			'price' => 'Private $100 / 120 min · Group $50',
			'summary' => 'At Food Rx Nutrition Consulting Services, we offer virtual or in-person grocery tours where you learn how to read and understand nutrition labels and ingredient lists, and tips and tricks to make healthier food choices. Tailored grocery tours can be offered as private or group sessions limited to 6 participants. In both formats, you will take home helpful nutrition resources including a shopping guide, a nutrition summary for your specific conditions, a sample meal plan, label reading tips, and more.',
			'details' => array(
				'Learn to read and understand nutrition labels and ingredient lists',
				'Learn how to create a shopping list and menu plan that fits your lifestyle needs',
				'Review foods to include and foods to manage your chronic condition with specific dietary guidelines',
				'Discuss balanced meals and snack choices and meet dietary requirements',
				'Learn how to navigate grocery store aisles, stay on budget, and make smart shopping choices in different sections of the store',
				'Get answers to your nutrition questions',
				'And more',
			),
		),
		array(
			'title' => 'Media & Professional Nutrition Writing',
			'price' => 'Custom',
			'summary' => 'As a registered dietitian, I can bring credibility, clarity, and confidence to your health and wellness content. I create clear, evidence-based freelance nutrition content that is engaging, culturally relevant, and tailored to your target audience. From blog posts and articles to educational resources, I translate complex nutrition science into practical, trustworthy content that connects. With a focus on inclusivity and accessibility, I specialize in making nutrition simple, relevant, and engaging — while upholding the science behind it.',
			'details' => array(),
		),
		array(
			'title' => 'For Health Professionals',
			'price' => 'Custom',
			'summary' => 'As a health provider, nutrition topics come up daily, but you might not be entirely sure what to tell patients to empower them to make healthy changes. You might not have gotten a lot of hands-on training to support patients with healthy eating, you\'re a busy provider with many other patient care concerns, or the constant influx of nutrition studies and guidelines leaves your head spinning — where do you even begin?

With all the demands on your time as a health provider, it can be hard to sort out the latest nutrition research. Plus, even when those healthy eating messages are clear, you might not feel sure about how to help your patients create lasting changes to their diets.

As a Registered Dietitian, I help connect health care professionals like doctors, nurse practitioners, and pharmacists with simple, clear nutrition messages for their patients. I help health care professionals find the simple, bite-sized, actionable nutrition messages that are truly patient-centered. I connect you with the tools and resources, tailored to your needs, that help you efficiently and effectively support your patients in eating well to manage their health conditions. Reach out today to learn more about how we can work together.',
			'details' => array(),
		),
	);
}

/**
 * @return array<int, array{question: string, answer: string}>
 */
function foodrx_get_faq_items() {
	return array(
		array(
			'question' => 'What is a Registered Dietitian?',
			'answer' => 'Registered Dietitian is a protected title under provincial legislation. In Ontario, dietitians are regulated by the College of Dietitians of Ontario. Only practitioners who possess the necessary educational qualifications and have met national standards are authorized to use this title. This ensures that individuals seeking nutrition advice receive guidance from qualified professionals.',
		),
		array(
			'question' => 'What is the difference between a Registered Dietitian and a Nutritionist?',
			'answer' => 'Registered Dietitians (RDs) in Ontario are uniquely trained food and nutrition experts. They are authorized experts in translating scientific, medical, and nutrition information into practical individualized therapeutic diets, healthy meal plans for people, and building the capacity of individuals and communities to access nutrition for health and well-being.

The term "Nutritionist" is not protected by law in Ontario, so people with different levels of knowledge and training can call themselves a "Nutritionist".',
		),
		array(
			'question' => 'Why should I see a Registered Dietitian?',
			'answer' => 'Seeing a Registered Dietitian can be a great step towards improving your health and well-being. They offer expert guidance and create practical and realistic nutrition plans tailored to your needs, ensuring long-term success.',
		),
		array(
			'question' => 'Do I need a referral to see a Registered Dietitian?',
			'answer' => 'You do not need a referral from your doctor to see a Registered Dietitian. You can book an appointment on your own and start your journey towards a healthier you today.',
		),
		array(
			'question' => 'Are Registered Dietitian services covered by OHIP?',
			'answer' => 'At this time, private Registered Dietitian services are not covered by OHIP. However, your extended health insurance benefits may provide full or partial coverage. We recommend that you check with your insurance company to find out the details of your coverage before your first appointment.

In Ontario, Registered Dietitians are classified as an "Authorized Medical Practitioner." Even if your extended health insurance plan does not cover Registered Dietitian services, keep your receipt and provide it to your accountant to receive a non-refundable tax credit from the government.',
		),
		array(
			'question' => 'How do you accept payment?',
			'answer' => 'We are primarily a private-pay practice. We will provide a detailed receipt of payment after each session that can be submitted to your insurance company for reimbursement.

If your insurance does not cover dietitian services, we suggest you save your receipts as you may be eligible to claim them under medical expenses when filing your taxes. We accept all major credit cards (Visa, Mastercard via Square) and e-transfer.',
		),
		array(
			'question' => 'What is your cancellation policy?',
			'answer' => 'Out of consideration for other clients who could book in your appointment slot, please provide 24-hour notice when cancelling your appointment. Otherwise a $50 late cancellation fee may apply.',
		),
		array(
			'question' => 'Do I need follow-up sessions?',
			'answer' => 'This largely depends on the reason why you\'re seeking nutritional counselling. After you complete the single session, you can decide later whether you need a follow-up. You can purchase follow-up sessions if you feel you need them.',
		),
		array(
			'question' => 'Can I do follow-up sessions without completing the first session?',
			'answer' => 'No, you cannot jump directly into follow-up sessions without completing the first step. Our practitioners follow a protocol and require background information, intake form, the educational component, and so on — and this cannot be achieved in a single follow-up session.',
		),
		array(
			'question' => 'Do you sell supplements?',
			'answer' => 'We do not sell supplements, but we will evaluate your diet and medical condition and advise you if supplements are recommended.',
		),
		array(
			'question' => 'Is this a weight-loss clinic?',
			'answer' => 'Food Rx Nutrition Consulting Services focuses on health optimization and sustainable habit change. Weight loss may be a goal, but we prioritize:

• Metabolic health
• Long-term behavior change
• Improved lab markers
• Energy and overall wellness

We do not promote crash dieting or extreme restriction.',
		),
		array(
			'question' => 'How quickly will I see results?',
			'answer' => 'Results vary depending on your starting point, consistency, and goals. Long-term transformation is built gradually — and sustainably.',
		),
		array(
			'question' => 'How many sessions will I need?',
			'answer' => 'It depends on your goals. Sustainable change requires consistency. Most clients see the best results with ongoing coaching rather than one visit.',
		),
	);
}

/**
 * Demo image keys mapped to upload paths and bundled fallbacks.
 *
 * @return array<string, array{upload: string, bundled: string}>
 */
function foodrx_get_page_bg_definitions() {
	return array(
		'services' => array(
			'upload' => '2016/08/05.jpg',
			'bundled' => '2016-08-05.jpg',
		),
		'nutrition-hub' => array(
			'upload' => '2016/08/06.jpg',
			'bundled' => '2016-08-06.jpg',
		),
		'nutrition-hub-hero' => array(
			'upload' => '2016/08/03.jpg',
			'bundled' => '2016-08-03.jpg',
		),
		'faq' => array(
			'upload' => '2016/08/02.jpg',
			'bundled' => '2016-08-02.jpg',
		),
		'contact-form' => array(
			'upload' => '2016/08/06.jpg',
			'bundled' => '2016-08-06.jpg',
		),
		'contact-map' => array(
			'upload' => '2025/10/google-map-placeholder-wide.webp',
			'bundled' => 'google-map-placeholder-wide.webp',
		),
	);
}

/**
 * Resolve a demo image URL from uploads, bundled assets, or theme fallback.
 *
 * @param string $upload_relative Path under wp-content/uploads.
 * @param string $bundled_filename Filename in assets/img/demo-bg/.
 * @return string
 */
function foodrx_resolve_image_url($upload_relative, $bundled_filename) {
	$upload_dir = wp_upload_dir();
	$absolute_path = trailingslashit($upload_dir['basedir']) . $upload_relative;

	if (file_exists($absolute_path)) {
		return trailingslashit($upload_dir['baseurl']) . $upload_relative;
	}

	$bundled_path = get_template_directory() . '/assets/img/demo-bg/' . $bundled_filename;

	if (is_readable($bundled_path)) {
		return get_template_directory_uri() . '/assets/img/demo-bg/' . $bundled_filename;
	}

	return get_template_directory_uri() . '/img/heading_bg.jpg';
}

/**
 * @param string $page_key Page background key from foodrx_get_page_bg_definitions().
 * @return string
 */
function foodrx_get_page_bg_url($page_key) {
	$definitions = foodrx_get_page_bg_definitions();

	if (!isset($definitions[$page_key])) {
		return '';
	}

	$definition = $definitions[$page_key];

	return foodrx_resolve_image_url($definition['upload'], $definition['bundled']);
}

/**
 * CMSMasters heading background meta value for a direct image URL.
 *
 * @param string $url Image URL.
 * @return string
 */
function foodrx_format_heading_bg_meta($url) {
	return '0|' . $url . '|full';
}

/**
 * Decorative divider image used in demo section headings.
 *
 * @return string
 */
function foodrx_get_divider_image_url() {
	return foodrx_resolve_image_url('2015/11/img1.png', '2015-11-img1.png');
}

/**
 * Hero background image URL when demo media is available.
 *
 * @return string
 */
function foodrx_get_hero_bg_url() {
	return foodrx_get_page_bg_url('nutrition-hub');
}

/**
 * Featured promo block for the Nutrition Hub split hero.
 *
 * @return array{label: string, title: string, body: string, cta_label: string, cta_url: string}
 */
function foodrx_get_nutrition_hub_featured() {
	return array(
		'label' => 'Nutrition Hub',
		'title' => 'Evidence-Based Tips & Recipes',
		'body' => 'Practical nutrition articles and simple recipes from Food Rx Nutrition Consulting Services to support your everyday health goals.',
		'cta_label' => 'Browse Articles',
		'cta_url' => '#foodrx-blog-posts',
	);
}

/**
 * @return array<int, array{icon: string, title: string, color: string, url: string}>
 */
function foodrx_get_service_tiles() {
	return array(
		array(
			'icon' => 'cmsmasters-icon-custom-burgervsapple',
			'title' => 'Signature Program',
			'color' => '#ffa544',
			'url' => '#foodrx-programs',
		),
		array(
			'icon' => 'cmsmasters-icon-custom-woman',
			'title' => 'Corporate Wellness',
			'color' => '#fe8543',
			'url' => '#foodrx-programs',
		),
		array(
			'icon' => 'cmsmasters-icon-custom-libra',
			'title' => 'Cooking Classes',
			'color' => '#a7d433',
			'url' => '#foodrx-programs',
		),
		array(
			'icon' => 'cmsmasters-icon-custom-vitamins',
			'title' => 'Grocery Tours',
			'color' => '#01b4bd',
			'url' => '#foodrx-programs',
		),
	);
}

/**
 * @return array<int, array{icon: string, title: string, body: string}>
 */
function foodrx_get_corporate_benefit_boxes() {
	return array(
		array(
			'icon' => 'cmsmasters-icon-heart-3',
			'title' => 'Greater Staff Retention',
			'body' => 'Wellness programs help employees feel supported and valued, improving long-term engagement.',
		),
		array(
			'icon' => 'cmsmasters-icon-calendar-3',
			'title' => 'Decreased Absent Days',
			'body' => 'Healthier habits can reduce fatigue and absenteeism across your team.',
		),
		array(
			'icon' => 'cmsmasters-icon-chart-bar-1',
			'title' => 'Increased Productivity',
			'body' => 'Better nutrition supports focus, energy, and sustained performance at work.',
		),
		array(
			'icon' => 'cmsmasters-icon-users-1',
			'title' => 'Improved Workplace Morale',
			'body' => 'Interactive sessions create a positive culture around health and wellbeing.',
		),
		array(
			'icon' => 'cmsmasters-icon-star-3',
			'title' => 'Higher Quality of Work',
			'body' => 'Empowered employees bring stronger attention and consistency to daily tasks.',
		),
		array(
			'icon' => 'cmsmasters-icon-globe-3',
			'title' => 'Virtual Across Canada',
			'body' => 'Flexible delivery makes workplace wellness accessible for distributed teams.',
		),
	);
}

/**
 * @return array<int, array{icon: string, color: string, value: string, label: string, href: string}>
 */
function foodrx_get_contact_details() {
	$site = foodrx_get_site_content();
	$email = !empty($site['contact_email']) ? $site['contact_email'] : 'hello@foodrxnutrition.com';
	$phone = !empty($site['contact_phone']) ? $site['contact_phone'] : 'Book Online';

	return array(
		array(
			'icon' => 'cmsmasters-icon-phone-4',
			'color' => '#fe8543',
			'value' => $phone,
			'label' => 'Phone',
			'href' => home_url('/contact/#foodrx-contact-form'),
		),
		array(
			'icon' => 'cmsmasters-icon-location-3',
			'color' => '#a7d433',
			'value' => $site['location'],
			'label' => 'Address',
			'href' => '',
		),
		array(
			'icon' => 'cmsmasters-icon-mail-3',
			'color' => '#01b4bd',
			'value' => $email,
			'label' => 'Email',
			'href' => 'mailto:' . $email,
		),
	);
}

/**
 * Demo-style process steps for the Contacts page layout.
 *
 * @return array<int, array{number: string, title: string, lines: array<int, string>, color: string}>
 */
function foodrx_get_contact_steps() {
	return array(
		array(
			'number' => '01.',
			'title' => 'Contact Us!',
			'lines' => array(
				'Lorem ipsum dolor sit amet,',
				'consectetur cing elit.',
			),
			'color' => '#ffa544',
		),
		array(
			'number' => '02.',
			'title' => 'Fit Body Form',
			'lines' => array(
				'Lorem ipsum dolor sit amet,',
				'consectetur cing elit.',
			),
			'color' => '#fe8543',
		),
		array(
			'number' => '03.',
			'title' => 'Excess Weight',
			'lines' => array(
				'Lorem ipsum dolor sit amet,',
				'consectetur cing elit.',
			),
			'color' => '#a7d433',
		),
		array(
			'number' => '04.',
			'title' => 'Your Life Awesome',
			'lines' => array(
				'Lorem ipsum dolor sit amet,',
				'consectetur cing elit.',
			),
			'color' => '#01b4bd',
		),
	);
}

/**
 * @return array{terms: string, privacy: string}
 */
function foodrx_get_legal_content() {
	return array(
		'terms' => 'These Terms and Conditions govern your use of Food Rx Nutrition Consulting Services website and services. By using this site or booking services, you agree to these terms.

Services are provided by a Registered Dietitian in Ontario, Canada. Nutrition counselling is educational and supportive in nature and does not replace medical care from your physician.

Appointments require 24-hour notice for cancellation. Late cancellations may incur a $50 fee. Payment is due as agreed at booking. Receipts are provided for insurance or tax purposes.

Content on this website is for general information only and is not medical advice. Always consult your healthcare provider for medical concerns.

Contact us with any questions about these terms.',
		'privacy' => 'Food Rx Nutrition Consulting Services respects your privacy. This policy describes how we collect, use, and protect your personal information.

We may collect your name, email address, phone number, health-related information you provide in intake forms, and messages sent through our contact form. This information is used to deliver nutrition services, respond to inquiries, and improve our services.

We do not sell your personal information. We may use secure third-party tools for appointments, payments, and email. We retain information only as long as needed for care and legal obligations.

You may request access to or correction of your personal information by contacting us.

This policy may be updated from time to time. Last updated: ' . gmdate('F j, Y') . '.',
	);
}
