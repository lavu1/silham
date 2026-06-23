<?php

return [
    'global' => [
        'site_name' => [
            'label' => 'Site name',
            'type' => 'text',
            'default' => 'SILHAM CONSULTING &amp; TRAINING SERVICES',
        ],
        'logo_path' => [
            'label' => 'Header logo path',
            'type' => 'image',
            'default' => 'assets/img/logo3.png',
        ],
        'footer_logo_path' => [
            'label' => 'Footer logo path',
            'type' => 'image',
            'default' => 'assets/img/logo4.png',
        ],
        'topbar_email' => [
            'label' => 'Top bar email',
            'type' => 'text',
            'default' => 'info@silhamconsulting.co.zm',
        ],
        'topbar_phone' => [
            'label' => 'Top bar phone',
            'type' => 'text',
            'default' => '+260 750 786 820',
        ],
        'social_facebook' => [
            'label' => 'Facebook link',
            'type' => 'text',
            'default' => '#',
        ],
        'social_twitter' => [
            'label' => 'Twitter link',
            'type' => 'text',
            'default' => '#',
        ],
        'social_linkedin' => [
            'label' => 'LinkedIn link',
            'type' => 'text',
            'default' => '#',
        ],
        'social_pinterest' => [
            'label' => 'Pinterest link',
            'type' => 'text',
            'default' => '#',
        ],
        'contact_phone' => [
            'label' => 'Contact phone',
            'type' => 'text',
            'default' => '+260 750 78 6820',
        ],
        'contact_email' => [
            'label' => 'Contact email',
            'type' => 'text',
            'default' => 'info@silhamconsulting.co.zm',
        ],
        'contact_address' => [
            'label' => 'Contact address',
            'type' => 'text',
            'default' => 'Plot 9698 Mitengo, Ndola Zambia',
        ],
        'contact_recipient_emails' => [
            'label' => 'Receive contact emails (comma separated)',
            'type' => 'text',
            'default' => 'info@silhamconsulting.co.zm',
        ],
        'pecb_course_registration_url' => [
            'label' => 'PECB course registration URL',
            'type' => 'text',
            'default' => 'https://docs.google.com/forms/d/e/1FAIpQLSehTitcpNv6eR6Ts14X21Hvd_uYrodOIZ5nLHO0oshLj7J4EQ/viewform',
            'sync_default' => true,
        ],
        'footer_about' => [
            'label' => 'Footer about',
            'type' => 'textarea',
            'default' => 'Silham Consulting and Training Services helps organisations strengthen privacy governance, data protection compliance, training, audits, and outsourced DPO support.',
            'sync_default' => true,
        ],
        'footer_copyright' => [
            'label' => 'Footer copyright',
            'type' => 'text',
            'default' => '© 2024 Silham. All rights reserved.',
        ],
    ],
    'pages' => [
        'home' => [
            'label' => 'Home',
            'route_name' => 'home',
            'meta' => [
                'title' => 'Home',
                'meta_title' => 'Data Protection Services in Zambia | Silham Consulting',
                'meta_description' => 'Silham Consulting helps organisations in Zambia with data protection compliance, privacy consultancy, training, audits, DPIAs, and outsourced DPO services.',
                'meta_keywords' => 'Silham, data protection Zambia, privacy compliance, outsourced DPO, data protection training, DPIA, audits',
                'robots' => 'index,follow',
            ],
            'fragments' => [
                'body_html' => [
                    'label' => 'Full page HTML',
                    'type' => 'html',
                    'default' => null,
                    'sync_default' => true,
                    'help' => 'Leave this blank to use the structured Filament-managed sections below.',
                ],
                'hero_items' => [
                    'label' => 'Hero slides (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {
    "layout": "event_feature",
    "eyebrow": "PECB Course",
    "title": "GDPR Certified Data Protection Officer (CDPO) Course",
    "title_lines": [
      "GDPR Certified",
      "Data Protection Officer",
      "(CDPO) Course"
    ],
    "description": "13th July - 17th July, 2026 | Virtual Delivery | $1,200 per person",
    "description_lines": [
      "13th July - 17th July, 2026",
      "Virtual Delivery",
      "$1,200 per person"
    ],
    "image": "assets/img/home/events/pecb-cdpo-course-2026.png",
    "background_image": "assets/img/home/carousel/IMAGE07_12.jpg",
    "foreground_image": "assets/img/home/events/pecb-cdpo-course-2026.png",
    "foreground_alt": "GDPR Certified Data Protection Officer course flyer",
    "buttons": [
      {
        "text": "Register Now",
        "link": "https://docs.google.com/forms/d/e/1FAIpQLSehTitcpNv6eR6Ts14X21Hvd_uYrodOIZ5nLHO0oshLj7J4EQ/viewform",
        "style": "primary",
        "target": "_blank"
      },
      {
        "text": "Learn More",
        "link": "pecbCourse",
        "style": "outline-white"
      }
    ]
  },
  {
    "title": "Raising Awareness through Data Protection Awareness Workshops",
    "image": "assets/img/home/carousel/IMAGE07_12.jpg",
    "button_text": "Read more",
    "button_link": "carasel.one"
  },
  {
    "title": "Building Capacity for Compliance Readiness through Advanced Data Protection Training",
    "image": "assets/img/home/carousel/two.jpg",
    "button_text": "Read More",
    "button_link": "carasel.two"
  },
  {
    "title": "Achieving Compliance through Outsourced Data Protection Services",
    "image": "assets/img/home/carousel/three.jpg",
    "button_text": "Read More",
    "button_link": "carasel.three"
  },
  {
    "title": "Demonstrating Compliance through Data Audits",
    "image": "assets/img/home/carousel/IMAGE07_6.jpg",
    "button_text": "Read more",
    "button_link": "carasel.four"
  },
  {
    "title": "Managing Risk through Data Protection Impact Assessments",
    "image": "assets/img/home/carousel/IMAGE07_3.jpg",
    "button_text": "Read More",
    "button_link": "carasel.five"
  }
]
JSON
                ],
                'service_cards' => [
                    'label' => 'Service cards (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {"title":"Outsourced Data Protection Officers","text":"The Zambian Data Protection Act of 2021 requires every organisation to appoint or designate data protection leadership for compliance readiness.","link":"services.dpo","button":"Read More","icon":"ti-shield"},
  {"title":"Data Protection Training","text":"Silham Consulting and Training Services offers tailor-made data protection and privacy training for teams, officers, and managers.","link":"services.dpt","button":"Read More","icon":"ti-book"},
  {"title":"Data Protection Consultancy","text":"Silham Consulting and Training Services provides practical advisory support for privacy governance, compliance reviews, and implementation.","link":"services.dpc","button":"Read More","icon":"ti-light-bulb"},
  {"title":"Data Audit","text":"Independent data protection audit support helps organisations understand gaps, evidence compliance, and improve controls.","link":"services.dpas","button":"Read More","icon":"ti-clipboard"}
]
JSON
                ],
                'mission_vision' => [
                    'label' => 'Mission & Vision blocks (JSON)',
                    'type' => 'json',
                    'default' => <<<'JSON'
[
  {
    "title": "Mission",
    "text": "We will delight our customers with exceptional quality consultancy and training services in the areas of our service delivery, while helping them meet their business objectives.",
    "image": "assets/img/home/IMAGE07_28.jpg"
  },
  {
    "title": "Vision",
    "text": "To be the brand of choice in our chosen service markets in Zambia and in the region",
    "image": "assets/img/home/IMAGE07_28.jpg"
  }
]
JSON
                ],
                'faq_block' => [
                    'label' => 'FAQ featured block (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
{
  "small_title": "FAQs",
  "title": "How can Silham Consulting & Training Services help my organisation with regards to the Data Protection Act of 2021?",
  "description": "Silham Consulting & Training Services helps organisations assess readiness, train staff, build compliance documentation, and implement practical data protection controls.",
  "button": "Read More",
  "button_link": "faqs",
  "image": "assets/img/home/fqs/OIG3.npEsOFIiK9KbK6Saebc2.jpg"
}
JSON
                ],
                'event_cards' => [
                    'label' => 'Events and news cards (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {
    "title": "GDPR Certified Data Protection Officer (CDPO) Course",
    "image": "assets/img/home/events/pecb-cdpo-course-2026.png",
    "link": "pecbCourse",
    "date": "13th July - 17th July, 2026",
    "location": "Virtual Delivery",
    "extra": "$1,200 per person"
  },
  {
    "title": "CEO Attends AUDA-NEPAD Data Governance Policy Stakeholder Engagement Workshop",
    "image": "assets/img/home/events/silmevent.webp",
    "link": "dataGovernanceWorkshop",
    "date": "16-18 Sept, 2024",
    "location": "Kabwe, Zambia"
  },
  {
    "title": "CEO Attends AUDA-NEPAD Training of Trainers Workshop",
    "image": "assets/img/home/events/two.jpg",
    "link": "trainersWorkshop",
    "date": "20-22 Aug, 2024",
    "location": "Lusaka, Zambia"
  },
  {
    "title": "Press Release",
    "image": "assets/img/home/events/lvs.jpeg",
    "link": "pressRelease",
    "date": "23 Sept, 2024",
    "location": "Global"
  },
  {
    "title": "CEO & Principal Consultant Delivers Data Protection Awareness Training to the Health Sector",
    "image": "assets/img/home/events/lsd.jpeg",
    "link": "dataProtectionHealthSector",
    "date": "16-18 Sept, 2024",
    "location": "Kabwe, Zambia"
  }
]
JSON
                ],
                'partner_logos' => [
                    'label' => 'Partner logos (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {
    "image": "assets/img/website/pceb-logo.png",
    "alt": "PECB"
  }
]
JSON
                ],
            ],
        ],
        'about' => [
            'label' => 'About Us',
            'route_name' => 'about',
            'meta' => [
                'title' => 'About us',
                'meta_title' => 'About Us | Silham',
                'meta_description' => 'Silham Consulting and Training Services is the No1 Privacy and Data Protection Services provider in Zambia.',
                'meta_keywords' => 'Silham, about us, data protection, Zambia',
                'robots' => 'index,follow',
            ],
            'fragments' => [
                'who_image' => [
                    'label' => 'Who we are image',
                    'type' => 'image',
                    'default' => 'assets/img/home/carousel/IMAGE07_12.jpg',
                ],
                'who_title' => [
                    'label' => 'Who title',
                    'type' => 'text',
                    'default' => 'Who Are we?',
                ],
                'who_text' => [
                    'label' => 'Who text',
                    'type' => 'textarea',
                    'default' => 'Silham Consulting and Training Services is the No1 Privacy and Data Protection Services provider in Zambia...',
                ],
                'services_overview_title' => [
                    'label' => 'Services heading',
                    'type' => 'text',
                    'default' => 'What do we do?',
                ],
                'services_overview_intro' => [
                    'label' => 'Services overview text',
                    'type' => 'textarea',
                    'default' => 'Silham Consulting and Training Services was established to help organisations comply with the Data Protection Act of 2021 and related laws on data protection, and subsequently help them leverage compliance as a differentiator to enhance organisational value.',
                ],
                'services_list' => [
                    'label' => 'Services list (JSON)',
                    'type' => 'json',
                    'default' => <<<'JSON'
[
  {
    "title": "Outsourced Data Protection Officer (DPO) Services",
    "link": "services.dpo"
  },
  {
    "title": "Data Protection and Privacy Consulting Services",
    "link": "services.dpc"
  },
  {
    "title": "Data Protection Awareness and Training Services",
    "link": "services.dpt"
  },
  {
    "title": "Data Protection Auditor Services",
    "link": "services.dpas"
  }
]
JSON
                ],
                'mission_vision' => [
                    'label' => 'Mission & Vision (JSON)',
                    'type' => 'json',
                    'default' => <<<'JSON'
[
  {
    "title": "Mission",
    "text": "We will delight our customers with exceptional quality consultancy and training services in the areas of our service delivery, while helping them meet their business objectives.",
    "image": "assets/img/home/IMAGE07_28.jpg",
    "description": ""
  },
  {
    "title": "Vision",
    "text": "To be the brand of choice in our chosen service markets in Zambia and in the region.",
    "image": "assets/img/home/carousel/IMAGE07_12.jpg",
    "description": ""
  }
]
JSON
                ],
            ],
        ],
        'contact' => [
            'label' => 'Contact Us',
            'route_name' => 'contact',
            'meta' => [
                'title' => 'Contact us',
                'meta_title' => 'Contact Us | Silham',
                'meta_description' => 'Get in touch with Silham Consulting and Training Services.',
                'meta_keywords' => 'contact, data protection, silham',
                'robots' => 'index,follow',
            ],
            'fragments' => [
                'lead' => [
                    'label' => 'Contact lead text',
                    'type' => 'textarea',
                    'default' => 'Send us a message and our team will get back to you.',
                ],
                'hero_image' => [
                    'label' => 'Hero background',
                    'type' => 'image',
                    'default' => 'assets/img/home/carousel/IMAGE07_12.jpg',
                ],
            ],
        ],
        'events' => [
            'label' => 'Events & News',
            'route_name' => 'events',
            'meta' => [
                'title' => 'Events',
                'meta_title' => 'Events & News | Silham',
                'meta_description' => 'Events and news from Silham Consulting & Training Services.',
                'meta_keywords' => 'events, news, data protection',
                'robots' => 'index,follow',
            ],
            'fragments' => [
                'body_html' => [
                    'label' => 'Full page HTML',
                    'type' => 'html',
                    'default' => null,
                    'sync_default' => true,
                    'help' => 'Leave this blank to use the structured Filament-managed event sections below.',
                ],
                'hero_image' => [
                    'label' => 'Hero background',
                    'type' => 'image',
                    'sync_default' => true,
                    'default' => 'assets/img/home/events/event_back.png',
                ],
                'event_cards' => [
                    'label' => 'Events and news cards (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {
    "title": "GDPR Certified Data Protection Officer (CDPO) Course",
    "image": "assets/img/home/events/pecb-cdpo-course-2026.png",
    "link": "pecbCourse",
    "date": "13th July - 17th July, 2026",
    "location": "Virtual Delivery",
    "extra": "$1,200 per person",
    "summary": "Silham Consulting and Training Services, in conjunction with PECB of Canada, will run the GDPR Certified Data Protection Officer course."
  },
  {
    "title": "CEO Attends AUDA-NEPAD Data Governance Policy Stakeholder Engagement Workshop",
    "image": "assets/img/home/events/silmevent.webp",
    "link": "dataGovernanceWorkshop",
    "date": "16-18 Sept, 2024",
    "location": "Kabwe, Zambia",
    "summary": "Stakeholder engagement workshop on Zambia's data governance policy development."
  },
  {
    "title": "CEO Attends AUDA-NEPAD Training of Trainers Workshop",
    "image": "assets/img/home/events/two.jpg",
    "link": "trainersWorkshop",
    "date": "20-22 Aug, 2024",
    "location": "Lusaka, Zambia",
    "summary": "Training of trainers workshop focused on data governance and data protection capacity building."
  },
  {
    "title": "Press Release",
    "image": "assets/img/home/events/lvs.jpeg",
    "link": "pressRelease",
    "date": "23 Sept, 2024",
    "location": "Global",
    "summary": "PECB signs a partnership agreement with Silham Consulting."
  },
  {
    "title": "CEO & Principal Consultant Delivers Data Protection Awareness Training to the Health Sector",
    "image": "assets/img/home/events/lsd.jpeg",
    "link": "dataProtectionHealthSector",
    "date": "16-18 Sept, 2024",
    "location": "Kabwe, Zambia",
    "summary": "Data protection awareness training delivered to health sector participants."
  }
]
JSON
                ],
            ],
        ],
        'blog' => [
            'label' => 'Blog',
            'route_name' => 'blog',
            'meta' => [
                'title' => 'Blog',
                'meta_title' => 'Blog | Silham',
                'meta_description' => 'Resources and updates from Silham Consulting & Training Services.',
                'meta_keywords' => 'blog, articles, data protection',
                'robots' => 'index,follow',
            ],
        ],
        'faqs' => [
            'label' => 'FAQ',
            'route_name' => 'faqs',
            'meta' => [
                'title' => 'FAQs',
                'meta_title' => 'FAQs | Silham',
                'meta_description' => 'Frequently asked questions about data protection services.',
                'meta_keywords' => 'faqs, data protection',
                'robots' => 'index,follow',
            ],
        ],
        'services' => [
            'label' => 'Services',
            'route_name' => 'services',
            'meta' => [
                'title' => 'Services',
                'meta_title' => 'Services | Silham',
                'meta_description' => 'Data protection services and solutions by Silham Consulting &amp; Training Services.',
                'meta_keywords' => 'services, data protection, privacy, silham',
                'robots' => 'index,follow',
            ],
        ],
        'services.dpo' => [
            'label' => 'Outsourced DPO',
            'route_name' => 'services.dpo',
            'meta' => [
                'title' => 'Outsourced DPO',
                'meta_title' => 'Outsourced Data Protection Officer | Silham',
                'meta_description' => 'Outsourced Data Protection Officer services for organisations in Zambia.',
                'meta_keywords' => 'outsourced DPO, data protection officer, silham',
                'robots' => 'index,follow',
            ],
        ],
        'services.dpt' => [
            'label' => 'Training',
            'route_name' => 'services.dpt',
            'meta' => [
                'title' => 'Data Protection Training',
                'meta_title' => 'Data Protection Training | Silham',
                'meta_description' => 'Tailor-made data protection and privacy training for organisations and teams.',
                'meta_keywords' => 'data protection training, awareness, consultancy, silham',
                'robots' => 'index,follow',
            ],
        ],
        'services.dpc' => [
            'label' => 'Data Protection Consultancy',
            'route_name' => 'services.dpc',
            'meta' => [
                'title' => 'Data Protection Consultancy',
                'meta_title' => 'Data Protection Consultancy | Silham',
                'meta_description' => 'Professional data protection consultancy and compliance advisory services.',
                'meta_keywords' => 'data protection consultancy, compliance review, silham',
                'robots' => 'index,follow',
            ],
        ],
        'services.dpas' => [
            'label' => 'Data Protection Auditor Services',
            'route_name' => 'services.dpas',
            'meta' => [
                'title' => 'Data Protection Auditor Services',
                'meta_title' => 'Data Protection Auditor Services | Silham',
                'meta_description' => 'Independent data protection audits and privacy compliance assurance services.',
                'meta_keywords' => 'data protection audit, audit services, silham',
                'robots' => 'index,follow',
            ],
        ],
        'carasel.one' => [
            'label' => 'Carousel: Awareness Workshops',
            'route_name' => 'carasel.one',
            'meta' => [
                'title' => 'Raising Awareness through Data Protection Awareness Workshops',
                'meta_title' => 'Raising Awareness through Data Protection Awareness Workshops | Silham',
                'meta_description' => 'Raising awareness through practical data protection workshops and training.',
                'meta_keywords' => 'data protection workshop, awareness, silham',
                'robots' => 'index,follow',
            ],
        ],
        'carasel.two' => [
            'label' => 'Carousel: Compliance Readiness',
            'route_name' => 'carasel.two',
            'meta' => [
                'title' => 'Building Capacity for Compliance Readiness through Advanced Training',
                'meta_title' => 'Compliance Readiness Training | Silham',
                'meta_description' => 'Advanced data protection training for stronger readiness and safer processing.',
                'meta_keywords' => 'compliance readiness, data protection training, silham',
                'robots' => 'index,follow',
            ],
        ],
        'carasel.three' => [
            'label' => 'Carousel: Outsourced DPO Services',
            'route_name' => 'carasel.three',
            'meta' => [
                'title' => 'Achieving Compliance through Outsourced Data Protection Services',
                'meta_title' => 'Outsourced DPO Services | Silham',
                'meta_description' => 'Outsourced data protection officer support to improve compliance outcomes.',
                'meta_keywords' => 'outsourced DPO, compliance, silham',
                'robots' => 'index,follow',
            ],
        ],
        'carasel.four' => [
            'label' => 'Carousel: Demonstrating Compliance',
            'route_name' => 'carasel.four',
            'meta' => [
                'title' => 'Demonstrating Compliance through Data Audits',
                'meta_title' => 'Data Protection Audits | Silham',
                'meta_description' => 'Learn how silham supports compliance through structured data protection audits.',
                'meta_keywords' => 'data audits, compliance, silham',
                'robots' => 'index,follow',
            ],
        ],
        'carasel.five' => [
            'label' => 'Carousel: DPIA',
            'route_name' => 'carasel.five',
            'meta' => [
                'title' => 'Managing Risk through Data Protection Impact Assessments',
                'meta_title' => 'Data Protection Impact Assessment | Silham',
                'meta_description' => 'Data protection impact assessments to identify and manage privacy risk.',
                'meta_keywords' => 'DPIA, risk management, data protection, silham',
                'robots' => 'index,follow',
            ],
        ],
        'sectors.one' => [
            'label' => 'Sector: Banking and Finance',
            'route_name' => 'sectors.one',
            'meta' => [
                'title' => 'Banking and Finance',
                'meta_title' => 'Banking & Finance Data Protection | Silham',
                'meta_description' => 'Data protection considerations for banking and finance sector organisations.',
                'meta_keywords' => 'banking, finance, data protection, silham',
                'robots' => 'index,follow',
            ],
        ],
        'sectors.two' => [
            'label' => 'Sector: Pensions and Insurance',
            'route_name' => 'sectors.two',
            'meta' => [
                'title' => 'Pensions and Insurance',
                'meta_title' => 'Pensions & Insurance Sector Compliance | Silham',
                'meta_description' => 'Sector-specific data protection guidance for pension and insurance organisations.',
                'meta_keywords' => 'pensions, insurance, compliance, silham',
                'robots' => 'index,follow',
            ],
        ],
        'sectors.three' => [
            'label' => 'Sector: Healthcare',
            'route_name' => 'sectors.three',
            'meta' => [
                'title' => 'Medical and Healthcare',
                'meta_title' => 'Healthcare Data Protection Services | Silham',
                'meta_description' => 'Data protection support for medical and healthcare organisations and systems.',
                'meta_keywords' => 'healthcare, medical, data protection, silham',
                'robots' => 'index,follow',
            ],
        ],
        'sectors.four' => [
            'label' => 'Sector: Technology',
            'route_name' => 'sectors.four',
            'meta' => [
                'title' => 'Technology',
                'meta_title' => 'Technology Sector Data Protection | Silham',
                'meta_description' => 'Privacy and compliance support for technology organisations.',
                'meta_keywords' => 'technology, privacy, data protection, silham',
                'robots' => 'index,follow',
            ],
        ],
        'sectors.five' => [
            'label' => 'Sector: Education',
            'route_name' => 'sectors.five',
            'meta' => [
                'title' => 'Education',
                'meta_title' => 'Education Sector Data Protection | Silham',
                'meta_description' => 'Data protection and privacy advisory for schools, colleges, and educators.',
                'meta_keywords' => 'education, data protection, privacy, silham',
                'robots' => 'index,follow',
            ],
        ],
        'sectors.six' => [
            'label' => 'Sector: NGOs',
            'route_name' => 'sectors.six',
            'meta' => [
                'title' => 'Non-Governmental Organisations',
                'meta_title' => 'NGO Data Protection Services | Silham',
                'meta_description' => 'Data protection compliance support for NGOs and donor-driven organisations.',
                'meta_keywords' => 'ngo, non-governmental organisations, privacy, silham',
                'robots' => 'index,follow',
            ],
        ],
        'dataGovernanceWorkshop' => [
            'label' => 'Event: Data Governance Workshop',
            'route_name' => 'dataGovernanceWorkshop',
            'meta' => [
                'title' => 'Data Governance Workshop',
                'meta_title' => 'Data Governance Workshop | Silham Events',
                'meta_description' => 'Data Governance workshop details and highlights.',
                'meta_keywords' => 'data governance workshop, events, silham',
                'robots' => 'index,follow',
            ],
        ],
        'trainersWorkshop' => [
            'label' => 'Event: Trainers Workshop',
            'route_name' => 'trainersWorkshop',
            'meta' => [
                'title' => 'Trainers Workshop',
                'meta_title' => 'Data Protection Trainers Workshop | Silham Events',
                'meta_description' => 'Trainers workshop update from Silham.',
                'meta_keywords' => 'trainers workshop, data protection, events, silham',
                'robots' => 'index,follow',
            ],
        ],
        'pressRelease' => [
            'label' => 'Press Release',
            'route_name' => 'pressRelease',
            'meta' => [
                'title' => 'Press Release',
                'meta_title' => 'Press Release | Silham',
                'meta_description' => 'Latest press releases and official news from Silham.',
                'meta_keywords' => 'press release, silham, news',
                'robots' => 'index,follow',
            ],
        ],
        'dataProtectionHealthSector' => [
            'label' => 'Event: Health Sector Training',
            'route_name' => 'dataProtectionHealthSector',
            'meta' => [
                'title' => 'Data Protection Training for Health Sector',
                'meta_title' => 'Health Sector Data Protection Training | Silham',
                'meta_description' => 'Health sector data protection awareness training by Silham Consulting.',
                'meta_keywords' => 'health sector, data protection training, silham',
                'robots' => 'index,follow',
            ],
        ],
        'pecbCourse' => [
            'label' => 'Event: PECB CDPO Course',
            'route_name' => 'pecbCourse',
            'meta' => [
                'title' => 'GDPR Certified Data Protection Officer (CDPO) Course',
                'meta_title' => 'GDPR Certified Data Protection Officer (CDPO) Course | Silham',
                'meta_description' => 'Register for the PECB GDPR Certified Data Protection Officer course hosted by Silham Consulting and Training Services in July 2026.',
                'meta_keywords' => 'PECB, CDPO, GDPR, data protection officer course, Silham, Zambia',
                'og_image' => 'assets/img/home/events/pecb-cdpo-course-2026.png',
                'robots' => 'index,follow',
            ],
            'fragments' => [
                'body_html' => [
                    'label' => 'Full page HTML',
                    'type' => 'html',
                    'default' => null,
                    'sync_default' => true,
                    'help' => 'Leave this blank to use the structured Filament-managed course sections below.',
                ],
                'hero_image' => [
                    'label' => 'Hero background',
                    'type' => 'image',
                    'sync_default' => true,
                    'default' => 'assets/img/home/events/pecb-cdpo-course-2026.png',
                ],
                'intro_image' => [
                    'label' => 'Intro image',
                    'type' => 'image',
                    'sync_default' => true,
                    'default' => 'assets/img/home/events/pecb-cdpo-course-2026.png',
                ],
                'title' => [
                    'label' => 'Course title',
                    'type' => 'text',
                    'sync_default' => true,
                    'default' => 'PECB GDPR Certified Data Protection Officer (CDPO) Course',
                ],
                'subtitle' => [
                    'label' => 'Course subtitle',
                    'type' => 'text',
                    'sync_default' => true,
                    'default' => 'BEYOND RECOGNITION',
                ],
                'lead' => [
                    'label' => 'Course lead text',
                    'type' => 'textarea',
                    'sync_default' => true,
                    'default' => 'Silham Consulting and Training Services, in conjunction with Professional Evaluation and Certification Board (PECB) of Canada, will be running the GDPR Certified Data Protection Officer (CDPO) Course in July 2026.',
                ],
                'registration_url' => [
                    'label' => 'Registration URL',
                    'type' => 'text',
                    'sync_default' => true,
                    'default' => 'https://docs.google.com/forms/d/e/1FAIpQLSehTitcpNv6eR6Ts14X21Hvd_uYrodOIZ5nLHO0oshLj7J4EQ/viewform',
                ],
                'course_facts' => [
                    'label' => 'Course facts (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {"icon":"far fa-calendar-alt","title":"Course Dates","text":"13th July, 2026 - 17th July, 2026"},
  {"icon":"far fa-clock","title":"Time","text":"9AM - 4PM"},
  {"icon":"fas fa-chalkboard-teacher","title":"Duration","text":"5 Days"},
  {"icon":"fas fa-laptop-house","title":"Mode of Delivery","text":"Virtual Delivery"}
]
JSON
                ],
                'fee_title' => [
                    'label' => 'Fee title',
                    'type' => 'text',
                    'sync_default' => true,
                    'default' => 'Course Fee: $1,200',
                ],
                'fee_text' => [
                    'label' => 'Fee description',
                    'type' => 'textarea',
                    'sync_default' => true,
                    'default' => 'Per Person (Includes Tuition, Course Material, Examination, PECB Certificate & Silham Certificate of Course Completion)',
                ],
                'target_audience' => [
                    'label' => 'Target audience (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  "Data Protection Officer's (DPO's)",
  "Aspiring DPO's",
  "Data Protection Compliance Regulators",
  "Consultants",
  "Practitioners & Managers"
]
JSON
                ],
                'why_take_course' => [
                    'label' => 'Why take this course (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  "Acquire knowledge and skills to serve effectively as a Data Protection Officer (DPO) in your organisation",
  "Gain competence to inform, advise and monitor compliance with the Data Protection Laws",
  "Widen your perspective on data protection regulation to international standards",
  "Gain Internationally recognized PECB CDPO Certification to show proof of professional capabilities & practical knowledge in data protection compliance practice"
]
JSON
                ],
                'important_note' => [
                    'label' => 'Important note',
                    'type' => 'textarea',
                    'sync_default' => true,
                    'default' => 'The General Data Protection Regulations (GDPR), which is the European Union data protection law, is the most comprehensive and leading data protection regulatory framework globally. Most jurisdictions in the world, including Zambia, have based their respective data protection legal frameworks on the GDPR. Therefore, having a GDPR-based qualification enhances one\'s ability to understand the Zambian Data Protection Act and implement its Compliance Roadmap.',
                ],
                'flyer_images' => [
                    'label' => 'Flyer images (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {
    "image": "assets/img/home/events/pecb-cdpo-course-2026.png",
    "alt": "PECB CDPO course July 2026 flyer"
  },
  {
    "image": "assets/img/home/events/pecb-cdpo-course-why.png",
    "alt": "Why take the PECB CDPO course"
  }
]
JSON
                ],
                'event_details' => [
                    'label' => 'Sidebar event details (JSON)',
                    'type' => 'json',
                    'sync_default' => true,
                    'default' => <<<'JSON'
[
  {"icon":"fas fa-calendar-alt","label":"Date","text":"13th July - 17th July, 2026"},
  {"icon":"fas fa-clock","label":"Time","text":"9AM - 4PM"},
  {"icon":"fas fa-laptop","label":"Delivery","text":"Virtual Delivery"},
  {"icon":"fas fa-money-bill-wave","label":"Fee","text":"$1,200 per person"},
  {"icon":"fas fa-certificate","label":"Certification","text":"PECB CDPO & Silham Certificate"}
]
JSON
                ],
            ],
        ],
    ],
];
