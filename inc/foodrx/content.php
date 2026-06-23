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
			'body' => 'We empower clients to take ownership of their health through education, support, and practical tools. Through flexible scheduling, virtual access, and continuous professional growth, we remain dedicated to meeting clients where they are.',
		),
	);
}

/**
 * @return string
 */
function foodrx_get_about_text() {
	return 'Hello, I am Mariam, your dedicated and passionate registered dietitian based in London, Ontario, Canada. I am a proud member of Dietitians of Canada and the College of Dietitians of Ontario, and the founder and director of Food Rx Nutrition Consulting Services.

My driving force is to help individuals understand how their daily food choices impact long-term health. I take great joy in educating and empowering individuals to make positive lifestyle changes that lead to improved well-being.

I believe that good nutrition is the foundation of a healthy life and that small, consistent changes can lead to long-term results. I have experience in Long-Term Care, Primary Care, Nutrition Management, and Public Health.

I am committed to using an evidence-based approach to nutrition counselling and strive to deliver personalized nutrition care tailored to individual needs, preferences, and cultural considerations.';
}

/**
 * @return array<int, string>
 */
function foodrx_get_specialties() {
	return array(
		'Weight management (loss or gain)',
		'Chronic disease management (high blood pressure, hyperlipidemia)',
		'Digestive and gut health (IBS, GERD, constipation, bloating)',
		'Prediabetes or type 2 diabetes mellitus',
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
			'body' => 'Discuss your health goals, review current challenges, ask questions about the nutrition process, and determine if we are a good fit. No obligation — just a supportive space to explore your next steps.',
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
			'summary' => '4-week live program — 2 hours per week via video conferencing. Synchronous sessions with no replay.',
			'details' => array(
				'Simplify meal planning and prepping',
				'Revamp favourite recipes or discover healthier ones',
				'Healthier choices when grocery shopping, dining out, or ordering take-out',
				'Evening routines for better sleep',
				'Stress management and nervous system reset strategies',
				'Hydration and daily movement habits',
				'Strategies for coping with cravings',
			),
		),
		array(
			'title' => 'Corporate / Workplace Wellness',
			'price' => '$100 / 2 hours',
			'summary' => 'Evidence-based nutrition education for workplaces. Virtual sessions across Canada. Price is all-inclusive.',
			'details' => array(
				'Healthy eating during shift work',
				'Grocery shopping the healthy way',
				'Mediterranean diet',
				'Building healthy habits',
				'Meal planning for busy schedules',
				'Heart Health 101',
				'Nutrition and stress',
				'Gut Health 101',
				'Plant-based nutrition',
				'Custom topics welcome',
			),
		),
		array(
			'title' => 'Cooking Classes',
			'price' => '$50 / 60 minutes',
			'summary' => 'Virtual or in-person hands-on cooking experiences — private or group cook-along sessions with a dietitian.',
			'details' => array(
				'Prepare nutritious dishes for your condition and preferences',
				'Healthy ingredient swaps in each recipe',
				'Meal planning strategies',
				'Take-home recipes and nutrition resources',
			),
		),
		array(
			'title' => 'Grocery Tours',
			'price' => 'Private $100 / 120 min · Group $50',
			'summary' => 'Virtual or in-person tours (group limited to 6). Learn label reading and smarter shopping.',
			'details' => array(
				'Read and understand nutrition labels and ingredient lists',
				'Create a shopping list and menu plan for your lifestyle',
				'Foods to include and manage chronic conditions',
				'Navigate aisles, stay on budget, and make smart choices',
			),
		),
		array(
			'title' => 'Media & Professional Nutrition Writing',
			'price' => 'Custom',
			'summary' => 'Evidence-based freelance nutrition content — blog posts, articles, and educational resources tailored to your audience.',
			'details' => array(),
		),
		array(
			'title' => 'For Health Professionals',
			'price' => 'Custom',
			'summary' => 'Simple, patient-centered nutrition messaging and resources for doctors, nurse practitioners, and pharmacists.',
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
			'answer' => 'Registered Dietitian is a protected title under provincial legislation. In Ontario, dietitians are regulated by the College of Dietitians of Ontario. Only practitioners who possess the necessary educational qualifications and have met national standards are authorized to use this title.',
		),
		array(
			'question' => 'What is the difference between a Registered Dietitian and a Nutritionist?',
			'answer' => 'Registered Dietitians (RDs) in Ontario are uniquely trained food and nutrition experts authorized to translate scientific, medical, and nutrition information into practical individualized therapeutic diets and healthy meal plans. The term "Nutritionist" is not protected by law in Ontario, so people with different levels of training can call themselves a nutritionist.',
		),
		array(
			'question' => 'Why should I see a Registered Dietitian?',
			'answer' => 'A Registered Dietitian offers expert guidance and creates practical, realistic nutrition plans tailored to your needs, ensuring long-term success.',
		),
		array(
			'question' => 'Do I need a referral to see a Registered Dietitian?',
			'answer' => 'No. You can book an appointment on your own and start your journey towards a healthier you today.',
		),
		array(
			'question' => 'Are Registered Dietitian services covered by OHIP?',
			'answer' => 'Private Registered Dietitian services are not covered by OHIP. Your extended health insurance may provide full or partial coverage — check with your insurer before your first appointment. In Ontario, Registered Dietitians are classified as an "Authorized Medical Practitioner," and receipts may qualify for a non-refundable tax credit when filing taxes.',
		),
		array(
			'question' => 'How do you accept payment?',
			'answer' => 'We are primarily a private-pay practice and provide a detailed receipt after each session for insurance reimbursement. We accept major credit cards (Visa, Mastercard via Square) and e-transfer. If insurance does not cover dietitian services, save your receipts — you may be eligible to claim them as medical expenses when filing taxes.',
		),
		array(
			'question' => 'What is your cancellation policy?',
			'answer' => 'Please provide 24-hour notice when cancelling your appointment. Otherwise a $50 late cancellation fee may apply.',
		),
		array(
			'question' => 'Do I need follow-up sessions?',
			'answer' => 'This depends on your goals. After a single session, you can decide whether follow-up sessions would be helpful and purchase them as needed.',
		),
		array(
			'question' => 'Can I do follow-up sessions without completing the first session?',
			'answer' => 'No. Our practitioners follow a structured protocol that requires background information, intake, and an educational foundation that cannot be completed in a single follow-up visit.',
		),
		array(
			'question' => 'Do you sell supplements?',
			'answer' => 'We do not sell supplements, but we will evaluate your diet and medical condition and advise you if supplements are recommended.',
		),
		array(
			'question' => 'Is this a weight-loss clinic?',
			'answer' => 'Food Rx Nutrition Consulting Services focuses on health optimization and sustainable habit change. Weight loss may be a goal, but we prioritize metabolic health, long-term behaviour change, improved lab markers, energy, and overall wellness. We do not promote crash dieting or extreme restriction.',
		),
		array(
			'question' => 'How quickly will I see results?',
			'answer' => 'Results vary depending on your starting point, consistency, and goals. Long-term transformation is built gradually and sustainably.',
		),
		array(
			'question' => 'How many sessions will I need?',
			'answer' => 'It depends on your goals. Most clients see the best results with ongoing coaching rather than a single visit.',
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
