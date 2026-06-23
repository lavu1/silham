@extends('layouts.master')
@section('page_title', 'FAQs')
@section('content')
@php
    $generalFaqs = [
        [
            'question' => 'What type of personal information do organisations need to protect?',
            'answer' => 'Organisations should protect any information that can identify a person, including names, contact details, identity numbers, employment records, customer records, health information, financial information, online identifiers, and any other data linked to an individual.',
        ],
        [
            'question' => 'How can Silham help with data protection compliance?',
            'answer' => 'Silham supports organisations with readiness assessments, privacy governance, policy development, staff awareness training, audits, impact assessments, outsourced DPO services, and practical compliance implementation.',
        ],
        [
            'question' => 'Do we need a Data Protection Officer?',
            'answer' => 'Many organisations need a designated person or function to oversee data protection responsibilities. Silham can help assess your obligations and provide outsourced DPO support where internal capacity is limited.',
        ],
        [
            'question' => 'What happens during a compliance readiness assessment?',
            'answer' => 'A readiness assessment reviews how personal data is collected, used, stored, shared, retained, and protected. The output is a practical gap report with recommended actions for improving compliance.',
        ],
    ];

    $serviceFaqs = [
        [
            'question' => 'What is data protection training?',
            'answer' => 'Data protection training teaches staff and managers how to handle personal information lawfully, securely, and responsibly. Training can be tailored for executives, DPOs, operational teams, and frontline staff.',
        ],
        [
            'question' => 'What is a Data Protection Impact Assessment?',
            'answer' => 'A Data Protection Impact Assessment helps identify and reduce privacy risks before a project, system, process, or technology begins processing personal data.',
        ],
        [
            'question' => 'What is included in a data protection audit?',
            'answer' => 'An audit checks whether policies, controls, contracts, records, security measures, and operational practices support compliance. It helps management understand gaps and prioritise remediation.',
        ],
        [
            'question' => 'Can Silham support organisations outside Ndola?',
            'answer' => 'Yes. Silham supports clients across Zambia and can deliver advisory work, training, and meetings in person or virtually depending on the assignment.',
        ],
    ];
@endphp

<div class="py-5 bg-light-v2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>FAQs</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end bg-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        FAQs
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="padding-y-80">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>General Questions</h2>
                <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40 mx-auto"></div>
            </div>

            @foreach ($generalFaqs as $faq)
                <div class="col-md-6">
                    <div class="mb-5">
                        <h4 class="mb-3">{{ $faq['question'] }}</h4>
                        <p>{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="padding-y-100 bg-light-v2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto text-center">
                <h2 class="h1">Frequently Asked Questions</h2>
                <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40 mx-auto"></div>
            </div>

            <div class="col-12 mt-4">
                <div id="accordion-7" class="accordion-style-7 bg-white shadow-v1">
                    @foreach (array_merge($generalFaqs, $serviceFaqs) as $index => $faq)
                        @php
                            $accordionId = 'acc7_'.($index + 1);
                        @endphp
                        <div class="accordion-item border-bottom border-light">
                            <a href="#{{ $accordionId }}" class="accordion__title h6 mb-0 py-3 px-4 {{ $index === 0 ? '' : 'collapsed' }}" data-toggle="collapse" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <span class="accordion__icon small mr-2 mt-1">
                                    <i class="ti-angle-down"></i>
                                    <i class="ti-angle-up"></i>
                                </span>
                                {{ $faq['question'] }}
                            </a>
                            <div id="{{ $accordionId }}" class="collapse {{ $index === 0 ? 'show' : '' }}" data-parent="#accordion-7">
                                <div class="px-4">
                                    <p>{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padding-y-100">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Compliance And Security</h2>
                <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40 mx-auto"></div>
            </div>

            @foreach ($serviceFaqs as $faq)
                <div class="col-md-6 mt-4">
                    <div class="mb-5">
                        <h4 class="mb-3">{{ $faq['question'] }}</h4>
                        <p>{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
