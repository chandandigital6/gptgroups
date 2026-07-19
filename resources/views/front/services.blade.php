@extends('front_pages.front_components.main')

@section('content')

<style>
    :root {
        --gpt-primary: #155eef;
        --gpt-secondary: #06b6d4;
        --gpt-dark: #081426;
        --gpt-muted: #5f6b7a;
        --gpt-border: #e5eaf1;
        --gpt-soft: #f5f9ff;
    }

    html { scroll-behavior: smooth; }

    .services-page * { box-sizing: border-box; }

    .services-page {
        color: var(--gpt-dark);
        overflow: hidden;
    }

    .service-container {
        width: min(100% - 32px, 1280px);
        margin-inline: auto;
    }

    .section-space {
        padding: 82px 0;
    }

    .section-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--gpt-primary);
        font-size: 13px;
        font-weight: 900;
        letter-spacing: .18em;
        text-transform: uppercase;
    }

    .section-kicker::before {
        content: "";
        width: 30px;
        height: 2px;
        border-radius: 999px;
        background: linear-gradient(90deg, var(--gpt-primary), var(--gpt-secondary));
    }

    .section-title {
        margin-top: 14px;
        max-width: 780px;
        font-size: clamp(34px, 5vw, 58px);
        line-height: 1.08;
        font-weight: 950;
        letter-spacing: -.035em;
        color: #081426;
    }

    .section-copy {
        margin-top: 18px;
        max-width: 760px;
        color: var(--gpt-muted);
        font-size: 17px;
        line-height: 1.8;
    }

    .gpt-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-height: 50px;
        padding: 0 24px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 900;
        text-decoration: none;
        transition: .25s ease;
    }

    .gpt-btn-primary {
        color: #fff;
        background: linear-gradient(135deg, var(--gpt-primary), #1d4ed8);
        box-shadow: 0 15px 35px rgba(21, 94, 239, .28);
    }

    .gpt-btn-primary:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 20px 45px rgba(21, 94, 239, .36);
    }

    .gpt-btn-light {
        color: #081426;
        background: #fff;
        border: 1px solid rgba(255,255,255,.55);
    }

    .gpt-btn-light:hover {
        color: var(--gpt-primary);
        transform: translateY(-3px);
    }

    /* HERO */
    .services-hero {
        position: relative;
        min-height: 650px;
        display: flex;
        align-items: center;
        isolation: isolate;
        background:
            linear-gradient(90deg, rgba(4, 14, 31, .96) 0%, rgba(4, 14, 31, .84) 48%, rgba(4, 14, 31, .24) 100%),
            url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=2000&q=88') center/cover no-repeat;
    }

    .services-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        background:
            radial-gradient(circle at 12% 25%, rgba(21, 94, 239, .35), transparent 30%),
            radial-gradient(circle at 85% 80%, rgba(6, 182, 212, .26), transparent 26%);
    }

    .services-hero-content {
        max-width: 820px;
        padding: 120px 0 150px;
        color: #fff;
    }

    .hero-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 9px 15px;
        border: 1px solid rgba(255,255,255,.22);
        border-radius: 999px;
        background: rgba(255,255,255,.09);
        backdrop-filter: blur(12px);
        color: #dff8ff;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .16em;
        text-transform: uppercase;
    }

    .hero-title {
        margin-top: 24px;
        max-width: 800px;
        font-size: clamp(44px, 7vw, 78px);
        line-height: .98;
        font-weight: 950;
        letter-spacing: -.05em;
    }

    .hero-title span {
        color: #67e8f9;
    }

    .hero-copy {
        margin-top: 24px;
        max-width: 700px;
        color: #d6e0ed;
        font-size: 18px;
        line-height: 1.75;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 34px;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        margin-top: 50px;
        max-width: 760px;
    }

    .hero-stat {
        padding: 18px 20px;
        border: 1px solid rgba(255,255,255,.16);
        border-radius: 20px;
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(12px);
    }

    .hero-stat strong {
        display: block;
        font-size: 17px;
        font-weight: 950;
    }

    .hero-stat span {
        display: block;
        margin-top: 5px;
        color: #b9c7d8;
        font-size: 12px;
        line-height: 1.5;
    }

    /* QUICK NAV */
    .service-nav-wrap {
        position: relative;
        z-index: 5;
        margin-top: -70px;
    }

    .service-nav {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        overflow: hidden;
        border: 1px solid var(--gpt-border);
        border-radius: 26px;
        background: #fff;
        box-shadow: 0 24px 70px rgba(15, 23, 42, .14);
    }

    .service-nav a {
        position: relative;
        min-height: 155px;
        padding: 26px 22px;
        color: #081426;
        text-decoration: none;
        border-right: 1px solid var(--gpt-border);
        transition: .25s ease;
    }

    .service-nav a:last-child { border-right: 0; }

    .service-nav a:hover {
        color: #fff;
        background: linear-gradient(145deg, var(--gpt-primary), #0ea5e9);
        transform: translateY(-4px);
    }

    .service-nav-number {
        color: var(--gpt-primary);
        font-size: 13px;
        font-weight: 950;
    }

    .service-nav a:hover .service-nav-number,
    .service-nav a:hover p {
        color: rgba(255,255,255,.8);
    }

    .service-nav h3 {
        margin-top: 16px;
        font-size: 18px;
        font-weight: 950;
    }

    .service-nav p {
        margin-top: 8px;
        color: #687385;
        font-size: 12px;
        line-height: 1.55;
    }

    /* INTRO */
    .services-intro {
        padding-top: 120px;
        background:
            radial-gradient(circle at 92% 10%, rgba(6, 182, 212, .09), transparent 25%),
            #fff;
    }

    .intro-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 64px;
        align-items: center;
    }

    .intro-image {
        position: relative;
        min-height: 520px;
    }

    .intro-image-main {
        width: 88%;
        height: 500px;
        object-fit: cover;
        border-radius: 32px;
        box-shadow: 0 30px 70px rgba(15,23,42,.16);
    }

    .intro-image-small {
        position: absolute;
        right: 0;
        bottom: 20px;
        width: 48%;
        height: 235px;
        object-fit: cover;
        border: 10px solid #fff;
        border-radius: 28px;
        box-shadow: 0 24px 55px rgba(15,23,42,.18);
    }

    .intro-badge {
        position: absolute;
        top: 24px;
        right: 10px;
        width: 145px;
        height: 145px;
        display: grid;
        place-items: center;
        padding: 18px;
        border-radius: 50%;
        color: #fff;
        text-align: center;
        background: linear-gradient(145deg, var(--gpt-primary), var(--gpt-secondary));
        box-shadow: 0 20px 50px rgba(21,94,239,.28);
    }

    .intro-badge strong {
        display: block;
        font-size: 28px;
        line-height: 1;
    }

    .intro-badge span {
        display: block;
        margin-top: 7px;
        font-size: 11px;
        line-height: 1.35;
        font-weight: 800;
        text-transform: uppercase;
    }

    .intro-points {
        display: grid;
        gap: 14px;
        margin-top: 30px;
    }

    .intro-point {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        padding: 16px;
        border: 1px solid var(--gpt-border);
        border-radius: 18px;
        background: #fff;
    }

    .intro-point-icon {
        flex: 0 0 42px;
        height: 42px;
        display: grid;
        place-items: center;
        border-radius: 13px;
        color: var(--gpt-primary);
        background: #eaf2ff;
        font-weight: 950;
    }

    .intro-point h4 {
        font-size: 15px;
        font-weight: 950;
    }

    .intro-point p {
        margin-top: 4px;
        color: var(--gpt-muted);
        font-size: 13px;
        line-height: 1.65;
    }

    /* SERVICE DETAIL */
    .service-detail {
        position: relative;
    }

    .service-detail:nth-of-type(even) {
        background: var(--gpt-soft);
    }

    .service-detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 70px;
        align-items: center;
    }

    .service-detail.reverse .service-detail-media {
        order: 2;
    }

    .service-detail.reverse .service-detail-content {
        order: 1;
    }

    .service-detail-media {
        position: relative;
    }

    .service-detail-media img {
        width: 100%;
        height: 560px;
        object-fit: cover;
        border-radius: 32px;
        box-shadow: 0 30px 75px rgba(15,23,42,.14);
    }

    .service-detail-media::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -28px;
        bottom: -28px;
        z-index: -1;
        border-radius: 34px;
        background: linear-gradient(145deg, rgba(21,94,239,.18), rgba(6,182,212,.20));
    }

    .service-index {
        display: inline-grid;
        place-items: center;
        width: 58px;
        height: 58px;
        border-radius: 18px;
        color: #fff;
        font-size: 18px;
        font-weight: 950;
        background: linear-gradient(145deg, var(--gpt-primary), var(--gpt-secondary));
        box-shadow: 0 14px 32px rgba(21,94,239,.26);
    }

    .service-detail h2 {
        margin-top: 22px;
        font-size: clamp(34px, 5vw, 54px);
        line-height: 1.08;
        font-weight: 950;
        letter-spacing: -.035em;
    }

    .service-tagline {
        margin-top: 12px;
        color: var(--gpt-primary);
        font-size: 15px;
        font-weight: 900;
    }

    .service-description {
        margin-top: 20px;
        color: var(--gpt-muted);
        font-size: 16px;
        line-height: 1.8;
    }

    .service-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-top: 28px;
    }

    .service-list-item {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        min-height: 56px;
        padding: 14px;
        border: 1px solid var(--gpt-border);
        border-radius: 16px;
        background: #fff;
        color: #263244;
        font-size: 13px;
        font-weight: 800;
        line-height: 1.45;
    }

    .service-list-item span {
        flex: 0 0 24px;
        height: 24px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        color: #fff;
        background: var(--gpt-primary);
        font-size: 11px;
    }

    .service-note {
        margin-top: 24px;
        padding: 18px 20px;
        border-left: 4px solid var(--gpt-secondary);
        border-radius: 0 16px 16px 0;
        color: #425168;
        background: #edfafe;
        font-size: 13px;
        line-height: 1.7;
    }

    /* GPT CARE SPECIAL */
    .gpt-care-panel {
        color: #fff;
        background:
            radial-gradient(circle at 80% 10%, rgba(6,182,212,.24), transparent 25%),
            linear-gradient(145deg, #071426, #0b2041);
    }

    .gpt-care-panel .service-detail h2,
    .gpt-care-panel .service-tagline {
        color: #fff;
    }

    .gpt-care-panel .service-description {
        color: #c7d2e2;
    }

    .gpt-care-panel .service-list-item {
        color: #ecf4ff;
        border-color: rgba(255,255,255,.12);
        background: rgba(255,255,255,.07);
    }

    .gpt-care-panel .service-note {
        color: #d7f8ff;
        background: rgba(6,182,212,.12);
    }

    /* JOURNEY */
    .journey-section {
        background:
            radial-gradient(circle at 10% 20%, rgba(21,94,239,.11), transparent 30%),
            radial-gradient(circle at 88% 75%, rgba(6,182,212,.12), transparent 28%),
            #fff;
    }

    .journey-header {
        max-width: 780px;
        margin: 0 auto;
        text-align: center;
    }

    .journey-header .section-title,
    .journey-header .section-copy {
        margin-left: auto;
        margin-right: auto;
    }

    .journey-track {
        position: relative;
        display: grid;
        grid-template-columns: repeat(7, minmax(0,1fr));
        gap: 14px;
        margin-top: 54px;
    }

    .journey-track::before {
        content: "";
        position: absolute;
        top: 37px;
        left: 7%;
        right: 7%;
        height: 3px;
        z-index: 0;
        background: linear-gradient(90deg, var(--gpt-primary), var(--gpt-secondary));
    }

    .journey-step {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .journey-dot {
        width: 74px;
        height: 74px;
        display: grid;
        place-items: center;
        margin: 0 auto;
        border: 8px solid #eef5ff;
        border-radius: 50%;
        color: #fff;
        font-weight: 950;
        background: linear-gradient(145deg, var(--gpt-primary), var(--gpt-secondary));
        box-shadow: 0 12px 28px rgba(21,94,239,.22);
    }

    .journey-step h3 {
        margin-top: 18px;
        font-size: 14px;
        line-height: 1.4;
        font-weight: 950;
    }

    .journey-step p {
        margin-top: 7px;
        color: var(--gpt-muted);
        font-size: 11px;
        line-height: 1.5;
    }

    /* WHY */
    .why-section {
        background: var(--gpt-soft);
    }

    .why-grid {
        display: grid;
        grid-template-columns: .85fr 1.15fr;
        gap: 64px;
        align-items: center;
    }

    .why-image {
        position: relative;
    }

    .why-image img {
        width: 100%;
        height: 610px;
        object-fit: cover;
        border-radius: 32px;
        box-shadow: 0 30px 70px rgba(15,23,42,.15);
    }

    .why-card-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 16px;
        margin-top: 32px;
    }

    .why-card {
        padding: 22px;
        border: 1px solid var(--gpt-border);
        border-radius: 22px;
        background: #fff;
        box-shadow: 0 12px 30px rgba(15,23,42,.05);
        transition: .25s ease;
    }

    .why-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 42px rgba(15,23,42,.10);
    }

    .why-card strong {
        display: block;
        font-size: 16px;
        font-weight: 950;
    }

    .why-card p {
        margin-top: 8px;
        color: var(--gpt-muted);
        font-size: 13px;
        line-height: 1.65;
    }

    /* FORM */
    .enquiry-section {
        background: #fff;
    }

    .enquiry-shell {
        display: grid;
        grid-template-columns: .85fr 1.15fr;
        overflow: hidden;
        border-radius: 34px;
        background: #fff;
        box-shadow: 0 30px 80px rgba(15,23,42,.13);
    }

    .enquiry-info {
        padding: 50px;
        color: #fff;
        background:
            radial-gradient(circle at 80% 10%, rgba(103,232,249,.22), transparent 28%),
            linear-gradient(145deg, #0b2f74, #087f9f);
    }

    .enquiry-info h2 {
        margin-top: 18px;
        font-size: 42px;
        line-height: 1.08;
        font-weight: 950;
        letter-spacing: -.035em;
    }

    .enquiry-info > p {
        margin-top: 18px;
        color: #d7f5ff;
        line-height: 1.75;
    }

    .contact-box {
        display: grid;
        gap: 13px;
        margin-top: 30px;
    }

    .contact-row {
        padding: 16px 18px;
        border: 1px solid rgba(255,255,255,.15);
        border-radius: 18px;
        background: rgba(255,255,255,.09);
    }

    .contact-row small {
        display: block;
        color: #bbecf7;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .12em;
    }

    .contact-row a,
    .contact-row span {
        display: block;
        margin-top: 5px;
        color: #fff;
        font-size: 15px;
        font-weight: 900;
        text-decoration: none;
    }

    .enquiry-form {
        padding: 50px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 18px;
    }

    .form-group.full { grid-column: 1 / -1; }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #344054;
        font-size: 12px;
        font-weight: 900;
    }

    .form-control {
        width: 100%;
        min-height: 50px;
        padding: 13px 15px;
        border: 1px solid #dfe5ed;
        border-radius: 14px;
        outline: none;
        color: #0f172a;
        background: #fff;
        font-size: 14px;
        transition: .2s ease;
    }

    textarea.form-control {
        min-height: 130px;
        resize: vertical;
    }

    .form-control:focus {
        border-color: var(--gpt-primary);
        box-shadow: 0 0 0 4px rgba(21,94,239,.09);
    }

    /* FAQ */
    .faq-section {
        background: var(--gpt-soft);
    }

    .faq-grid {
        display: grid;
        grid-template-columns: .75fr 1.25fr;
        gap: 60px;
    }

    .faq-list {
        display: grid;
        gap: 14px;
    }

    .faq-item {
        padding: 20px 22px;
        border: 1px solid var(--gpt-border);
        border-radius: 20px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(15,23,42,.04);
    }

    .faq-item summary {
        cursor: pointer;
        list-style: none;
        font-size: 15px;
        font-weight: 950;
    }

    .faq-item summary::-webkit-details-marker { display: none; }

    .faq-item p {
        margin-top: 14px;
        color: var(--gpt-muted);
        font-size: 13px;
        line-height: 1.75;
    }

    /* CTA */
    .services-cta {
        padding: 0 0 82px;
        background: var(--gpt-soft);
    }

    .cta-box {
        position: relative;
        overflow: hidden;
        padding: 54px;
        border-radius: 32px;
        color: #fff;
        background:
            radial-gradient(circle at 90% 10%, rgba(103,232,249,.30), transparent 25%),
            linear-gradient(135deg, #0a2f76, #1261d8 52%, #0798b9);
        box-shadow: 0 30px 70px rgba(21,94,239,.24);
    }

    .cta-box::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        right: -70px;
        bottom: -120px;
        border: 45px solid rgba(255,255,255,.10);
        border-radius: 50%;
    }

    .cta-inner {
        position: relative;
        z-index: 1;
        display: flex;
        gap: 30px;
        align-items: center;
        justify-content: space-between;
    }

    .cta-box h2 {
        max-width: 760px;
        font-size: clamp(32px, 4vw, 50px);
        line-height: 1.08;
        font-weight: 950;
        letter-spacing: -.035em;
    }

    .cta-box p {
        margin-top: 14px;
        max-width: 700px;
        color: #d7efff;
        line-height: 1.7;
    }

    @media (max-width: 1100px) {
        .service-nav { grid-template-columns: repeat(3, minmax(0,1fr)); }
        .service-nav a:nth-child(3) { border-right: 0; }
        .service-nav a:nth-child(-n+3) { border-bottom: 1px solid var(--gpt-border); }

        .intro-grid,
        .service-detail-grid,
        .why-grid,
        .enquiry-shell,
        .faq-grid {
            grid-template-columns: 1fr;
        }

        .service-detail.reverse .service-detail-media,
        .service-detail.reverse .service-detail-content {
            order: initial;
        }

        .journey-track {
            grid-template-columns: repeat(4, minmax(0,1fr));
        }

        .journey-track::before { display: none; }

        .why-image img { height: 480px; }
    }

    @media (max-width: 767px) {
        .section-space { padding: 62px 0; }
        .services-hero { min-height: auto; }
        .services-hero-content { padding: 100px 0 120px; }
        .hero-copy { font-size: 16px; }
        .hero-stats { grid-template-columns: 1fr; }

        .service-nav-wrap { margin-top: -52px; }
        .service-nav { grid-template-columns: 1fr; }
        .service-nav a {
            min-height: auto;
            border-right: 0;
            border-bottom: 1px solid var(--gpt-border);
        }
        .service-nav a:last-child { border-bottom: 0; }

        .services-intro { padding-top: 90px; }
        .intro-grid,
        .service-detail-grid,
        .why-grid,
        .faq-grid {
            gap: 40px;
        }

        .intro-image { min-height: 390px; }
        .intro-image-main {
            width: 100%;
            height: 370px;
        }
        .intro-image-small,
        .intro-badge { display: none; }

        .service-detail-media img { height: 390px; }
        .service-list { grid-template-columns: 1fr; }
        .journey-track { grid-template-columns: repeat(2, minmax(0,1fr)); }
        .why-card-grid,
        .form-grid { grid-template-columns: 1fr; }
        .form-group.full { grid-column: auto; }

        .enquiry-info,
        .enquiry-form,
        .cta-box { padding: 30px 22px; }

        .enquiry-info h2 { font-size: 34px; }

        .cta-inner {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="services-page">

    {{-- HERO --}}
    <section class="services-hero">
        <div class="service-container">
            <div class="services-hero-content">
                <span class="hero-label">GPT Group • Technology Services</span>

                <h1 class="hero-title">
                    Technology solutions built for
                    <span>business growth.</span>
                </h1>

                <p class="hero-copy">
                    GPT Group supports organizations, channel partners and end customers with
                    project sales, authorized distribution, pre-sales engineering, technical
                    support and dedicated repair, warranty and RMA services through GPT Care.
                </p>

                <div class="hero-actions">
                    <a href="#our-services" class="gpt-btn gpt-btn-primary">
                        Explore Our Services
                        <span>→</span>
                    </a>

                    <a href="#service-enquiry" class="gpt-btn gpt-btn-light">
                        Discuss Your Requirement
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <strong>End-to-End Support</strong>
                        <span>From consultation and BOQ review to delivery and after-sales assistance.</span>
                    </div>

                    <div class="hero-stat">
                        <strong>Partner-Focused</strong>
                        <span>Dedicated support for dealers, resellers, enterprises and project customers.</span>
                    </div>

                    <div class="hero-stat">
                        <strong>Service-Driven</strong>
                        <span>Technical support, repair, warranty handling and RMA under one ecosystem.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK SERVICE NAVIGATION --}}
    <div class="service-nav-wrap">
        <div class="service-container">
            <div class="service-nav">
                <a href="#b2b-project-sales">
                    <span class="service-nav-number">01</span>
                    <h3>B2B Project Sales</h3>
                    <p>Complete project-based solutions for enterprise, commercial and government sectors.</p>
                </a>

                <a href="#channel-sales">
                    <span class="service-nav-number">02</span>
                    <h3>Channel Sales</h3>
                    <p>Reliable products, commercial support and enablement for dealers and resellers.</p>
                </a>

                <a href="#pre-sales-engineering">
                    <span class="service-nav-number">03</span>
                    <h3>Pre-Sales Engineering</h3>
                    <p>Technical planning, site surveys, solution architecture and proposal support.</p>
                </a>

                <a href="#after-sales-support">
                    <span class="service-nav-number">04</span>
                    <h3>After-Sales Support</h3>
                    <p>Configuration, guidance, remote assistance, maintenance and on-site support.</p>
                </a>

                <a href="#gpt-care">
                    <span class="service-nav-number">05</span>
                    <h3>GPT Care</h3>
                    <p>Dedicated mobile repair, warranty service, diagnostics and RMA management.</p>
                </a>
            </div>
        </div>
    </div>

    {{-- INTRO --}}
    <section id="our-services" class="services-intro section-space">
        <div class="service-container">
            <div class="intro-grid">
                <div>
                    <span class="section-kicker">One Integrated Service Ecosystem</span>

                    <h2 class="section-title">
                        Supporting every stage of the technology lifecycle.
                    </h2>

                    <p class="section-copy">
                        Our service structure is designed around the actual needs of technology
                        projects and distribution businesses. We help customers plan correctly,
                        select suitable products, prepare commercial and technical documentation,
                        complete supply and deployment, and receive dependable support after delivery.
                    </p>

                    <div class="intro-points">
                        <div class="intro-point">
                            <div class="intro-point-icon">01</div>
                            <div>
                                <h4>Commercial and Technical Alignment</h4>
                                <p>Our sales and engineering teams work together so every proposal is practical, compliant and commercially competitive.</p>
                            </div>
                        </div>

                        <div class="intro-point">
                            <div class="intro-point-icon">02</div>
                            <div>
                                <h4>Support for Projects and Channel Partners</h4>
                                <p>We serve enterprise customers directly while also enabling dealers and resellers with stock, training and sales assistance.</p>
                            </div>
                        </div>

                        <div class="intro-point">
                            <div class="intro-point-icon">03</div>
                            <div>
                                <h4>Reliable Support Beyond Delivery</h4>
                                <p>Our relationship continues through technical assistance, maintenance, warranty handling, repair and RMA coordination.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="intro-image">
                    <img
                        class="intro-image-main"
                        src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Group business technology consultation"
                        loading="lazy"
                    >

                    <img
                        class="intro-image-small"
                        src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=900&q=85"
                        alt="Technology team collaborating on a project"
                        loading="lazy"
                    >

                    <div class="intro-badge">
                        <div>
                            <strong>360°</strong>
                            <span>Technology service support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 01 B2B PROJECT SALES --}}
    <section id="b2b-project-sales" class="service-detail section-space">
        <div class="service-container">
            <div class="service-detail-grid">
                <div class="service-detail-media">
                    <img
                        src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1300&q=85"
                        alt="B2B project sales and enterprise consultation"
                        loading="lazy"
                    >
                </div>

                <div class="service-detail-content">
                    <span class="service-index">01</span>

                    <h2>B2B Project Sales</h2>

                    <p class="service-tagline">
                        Complete project-based technology solutions for commercial, enterprise, industrial and government sectors.
                    </p>

                    <p class="service-description">
                        GPT Group works closely with consultants, contractors, system integrators,
                        corporate IT teams and procurement departments to support technology projects
                        from the earliest planning stage through final product supply. Our team reviews
                        requirements, understands commercial expectations and coordinates suitable
                        product solutions for successful project execution.
                    </p>

                    <div class="service-list">
                        <div class="service-list-item"><span>✓</span>Project Consultation</div>
                        <div class="service-list-item"><span>✓</span>BOQ Analysis</div>
                        <div class="service-list-item"><span>✓</span>Solution Design</div>
                        <div class="service-list-item"><span>✓</span>Product Selection</div>
                        <div class="service-list-item"><span>✓</span>Tender Support</div>
                        <div class="service-list-item"><span>✓</span>Commercial Quotations</div>
                    </div>

                    <div class="service-note">
                        Ideal for corporate offices, hospitality projects, retail developments,
                        educational institutions, industrial facilities, public-sector requirements
                        and other structured technology deployments.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 02 CHANNEL SALES --}}
    <section id="channel-sales" class="service-detail reverse section-space">
        <div class="service-container">
            <div class="service-detail-grid">
                <div class="service-detail-media">
                    <img
                        src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1300&q=85"
                        alt="GPT Group channel partner and reseller support"
                        loading="lazy"
                    >
                </div>

                <div class="service-detail-content">
                    <span class="service-index">02</span>

                    <h2>Channel Sales</h2>

                    <p class="service-tagline">
                        Reliable distribution and dedicated support for dealers, resellers and solution partners.
                    </p>

                    <p class="service-description">
                        Our channel sales model is built to help partners compete effectively in the
                        market. GPT Group provides access to dependable technology products, responsive
                        commercial support, product knowledge and partner enablement. We aim to build
                        long-term relationships by helping our network serve customers with confidence.
                    </p>

                    <div class="service-list">
                        <div class="service-list-item"><span>✓</span>Authorized Distribution</div>
                        <div class="service-list-item"><span>✓</span>Dealer & Reseller Support</div>
                        <div class="service-list-item"><span>✓</span>Competitive Pricing</div>
                        <div class="service-list-item"><span>✓</span>Stock Availability</div>
                        <div class="service-list-item"><span>✓</span>Marketing Support</div>
                        <div class="service-list-item"><span>✓</span>Partner Training</div>
                    </div>

                    <div class="service-note">
                        Our channel team supports regular trading requirements as well as project-driven
                        opportunities, helping partners with quotations, product alternatives and order coordination.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 03 PRE-SALES --}}
    <section id="pre-sales-engineering" class="service-detail section-space">
        <div class="service-container">
            <div class="service-detail-grid">
                <div class="service-detail-media">
                    <img
                        src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1300&q=85"
                        alt="Pre-sales engineering and technical planning"
                        loading="lazy"
                    >
                </div>

                <div class="service-detail-content">
                    <span class="service-index">03</span>

                    <h2>Pre-Sales Engineering</h2>

                    <p class="service-tagline">
                        Technical expertise that turns business requirements into practical, compliant solutions.
                    </p>

                    <p class="service-description">
                        Our pre-sales engineers support customers and sales partners before project
                        implementation. They study the requirement, identify technical risks, recommend
                        appropriate products and prepare the documentation needed for evaluation and approval.
                        This reduces uncertainty and helps stakeholders make informed technology decisions.
                    </p>

                    <div class="service-list">
                        <div class="service-list-item"><span>✓</span>Requirement Analysis</div>
                        <div class="service-list-item"><span>✓</span>Site Survey</div>
                        <div class="service-list-item"><span>✓</span>Solution Architecture</div>
                        <div class="service-list-item"><span>✓</span>BOQ Preparation</div>
                        <div class="service-list-item"><span>✓</span>Technical Proposal</div>
                        <div class="service-list-item"><span>✓</span>Product Demonstration</div>
                        <div class="service-list-item"><span>✓</span>Compliance Support</div>
                    </div>

                    <div class="service-note">
                        Pre-sales engineering supports both B2B project sales and channel sales, ensuring
                        that proposed products match the required specifications, environment and expected performance.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 04 AFTER SALES --}}
    <section id="after-sales-support" class="service-detail reverse section-space">
        <div class="service-container">
            <div class="service-detail-grid">
                <div class="service-detail-media">
                    <img
                        src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=1300&q=85"
                        alt="After-sales technical support and maintenance"
                        loading="lazy"
                    >
                </div>

                <div class="service-detail-content">
                    <span class="service-index">04</span>

                    <h2>After-Sales Support</h2>

                    <p class="service-tagline">
                        Dependable technical assistance that continues after product delivery and deployment.
                    </p>

                    <p class="service-description">
                        GPT Group remains available after delivery to help customers and partners resolve
                        technical queries, configure products, follow recommended maintenance practices and
                        coordinate support requirements. Our objective is to improve product continuity,
                        minimize disruption and protect the value of the customer’s technology investment.
                    </p>

                    <div class="service-list">
                        <div class="service-list-item"><span>✓</span>Technical Assistance</div>
                        <div class="service-list-item"><span>✓</span>Product Configuration</div>
                        <div class="service-list-item"><span>✓</span>Installation Guidance</div>
                        <div class="service-list-item"><span>✓</span>Remote Support</div>
                        <div class="service-list-item"><span>✓</span>Preventive Maintenance</div>
                        <div class="service-list-item"><span>✓</span>Firmware & Software Updates</div>
                        <div class="service-list-item"><span>✓</span>On-site Support, Where Applicable</div>
                    </div>

                    <div class="service-note">
                        Support scope may vary by product category, project agreement, warranty conditions,
                        brand policy and service location.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 05 GPT CARE --}}
    <section id="gpt-care" class="service-detail gpt-care-panel section-space">
        <div class="service-container">
            <div class="service-detail-grid">
                <div class="service-detail-media">
                    <img
                        src="https://images.unsplash.com/photo-1620283085068-5aab84e2db8e?auto=format&fit=crop&w=1300&q=85"
                        alt="GPT Care mobile device repair and warranty service center"
                        loading="lazy"
                    >
                </div>

                <div class="service-detail-content">
                    <span class="service-index">05</span>

                    <h2>GPT Care</h2>

                    <p class="service-tagline">
                        Dedicated Service, Repair & Warranty Center
                    </p>

                    <p class="service-description">
                        GPT Care is the dedicated service division of GPT Group, created to provide
                        structured repair, warranty and RMA support for mobile devices and technology
                        products. Our technical team follows a systematic process for inspection,
                        diagnosis, repair coordination, replacement handling and customer communication.
                    </p>

                    <div class="service-list">
                        <div class="service-list-item"><span>✓</span>Mobile Device Repair</div>
                        <div class="service-list-item"><span>✓</span>Warranty Services</div>
                        <div class="service-list-item"><span>✓</span>RMA Management</div>
                        <div class="service-list-item"><span>✓</span>Product Diagnostics</div>
                        <div class="service-list-item"><span>✓</span>Hardware Replacement</div>
                        <div class="service-list-item"><span>✓</span>Software Updates & Recovery</div>
                        <div class="service-list-item"><span>✓</span>Spare Parts Management</div>
                        <div class="service-list-item"><span>✓</span>Service Tracking & Customer Support</div>
                    </div>

                    <div class="service-note">
                        GPT Care gives repair and warranty operations a clear identity within the GPT Group
                        ecosystem while providing customers and partners with a dedicated point of contact
                        for service-related requirements.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICE JOURNEY --}}
    <section class="journey-section section-space">
        <div class="service-container">
            <div class="journey-header">
                <span class="section-kicker">Service Journey</span>

                <h2 class="section-title">
                    A clear path from consultation to long-term support.
                </h2>

                <p class="section-copy">
                    Each service has a defined role, while all five work together to create a complete
                    customer and partner experience.
                </p>
            </div>

            <div class="journey-track">
                <div class="journey-step">
                    <div class="journey-dot">01</div>
                    <h3>Consultation</h3>
                    <p>Understanding business, project and technical requirements.</p>
                </div>

                <div class="journey-step">
                    <div class="journey-dot">02</div>
                    <h3>Pre-Sales Engineering</h3>
                    <p>Survey, design, architecture and compliance review.</p>
                </div>

                <div class="journey-step">
                    <div class="journey-dot">03</div>
                    <h3>Quotation & Design</h3>
                    <p>Technical proposal, BOQ and commercial quotation.</p>
                </div>

                <div class="journey-step">
                    <div class="journey-dot">04</div>
                    <h3>Project / Channel Sales</h3>
                    <p>Order coordination through direct or partner channels.</p>
                </div>

                <div class="journey-step">
                    <div class="journey-dot">05</div>
                    <h3>Delivery</h3>
                    <p>Product supply, documentation and installation guidance.</p>
                </div>

                <div class="journey-step">
                    <div class="journey-dot">06</div>
                    <h3>After-Sales Support</h3>
                    <p>Configuration, maintenance and technical assistance.</p>
                </div>

                <div class="journey-step">
                    <div class="journey-dot">07</div>
                    <h3>GPT Care</h3>
                    <p>Repair, warranty service, diagnostics and RMA handling.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- WHY GPT --}}
    <section class="why-section section-space">
        <div class="service-container">
            <div class="why-grid">
                <div class="why-image">
                    <img
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=85"
                        alt="GPT Group technology service team"
                        loading="lazy"
                    >
                </div>

                <div>
                    <span class="section-kicker">Why GPT Group</span>

                    <h2 class="section-title">
                        Commercial strength backed by technical capability.
                    </h2>

                    <p class="section-copy">
                        Our strength comes from combining distribution experience, project understanding,
                        engineering support and service operations within one organization.
                    </p>

                    <div class="why-card-grid">
                        <div class="why-card">
                            <strong>Integrated Support</strong>
                            <p>Sales, engineering, supply and service teams work within one coordinated ecosystem.</p>
                        </div>

                        <div class="why-card">
                            <strong>Partner Enablement</strong>
                            <p>Dealers and resellers receive commercial guidance, product information and opportunity support.</p>
                        </div>

                        <div class="why-card">
                            <strong>Solution-Oriented Approach</strong>
                            <p>Recommendations are based on project requirements rather than product supply alone.</p>
                        </div>

                        <div class="why-card">
                            <strong>Post-Delivery Commitment</strong>
                            <p>Technical assistance, warranty coordination and repair services continue after delivery.</p>
                        </div>

                        <div class="why-card">
                            <strong>Clear Service Ownership</strong>
                            <p>GPT Care provides a dedicated identity for repair, diagnostics, warranty and RMA operations.</p>
                        </div>

                        <div class="why-card">
                            <strong>Business-Focused Communication</strong>
                            <p>Customers receive practical technical and commercial support throughout the engagement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ENQUIRY --}}
    <section id="service-enquiry" class="enquiry-section section-space">
        <div class="service-container">
            <div class="enquiry-shell">
                <div class="enquiry-info">
                    <span class="hero-label">Talk to Our Team</span>

                    <h2>Tell us how we can support your business.</h2>

                    <p>
                        Share your project, channel, technical support or service requirement.
                        Our team will connect you with the appropriate department.
                    </p>

                    <div class="contact-box">
                        <div class="contact-row">
                            <small>Phone</small>
                            <a href="tel:+96824501533">+968 2450 1533</a>
                        </div>

                        <div class="contact-row">
                            <small>Email</small>
                            <a href="mailto:info@gptgroups.com">info@gptgroups.com</a>
                        </div>

                        <div class="contact-row">
                            <small>Service Coverage</small>
                            <span>Projects, Distribution, Technical Support & GPT Care</span>
                        </div>
                    </div>
                </div>

                <div class="enquiry-form">
                    {{-- Replace # with your actual enquiry route --}}
                    <form action="#" method="POST">
                        @csrf

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Enter your full name" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Company Name</label>
                                <input class="form-control" type="text" name="company_name" placeholder="Enter company name">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input class="form-control" type="text" name="phone" placeholder="+968">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input class="form-control" type="email" name="email" placeholder="name@company.com" required>
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Service Required</label>
                                <select class="form-control" name="service_type" required>
                                    <option value="">Select a service</option>
                                    <option value="b2b_project_sales">B2B Project Sales</option>
                                    <option value="channel_sales">Channel Sales</option>
                                    <option value="pre_sales_engineering">Pre-Sales Engineering</option>
                                    <option value="after_sales_support">After-Sales Support</option>
                                    <option value="gpt_care_mobile_repair">GPT Care - Mobile Repair</option>
                                    <option value="gpt_care_warranty">GPT Care - Warranty Service</option>
                                    <option value="gpt_care_rma">GPT Care - RMA</option>
                                    <option value="other">Other Requirement</option>
                                </select>
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Requirement Details</label>
                                <textarea
                                    class="form-control"
                                    name="message"
                                    placeholder="Briefly describe your project, product, support or repair requirement"
                                    required
                                ></textarea>
                            </div>

                            <div class="form-group full">
                                <button type="submit" class="gpt-btn gpt-btn-primary">
                                    Submit Enquiry
                                    <span>→</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="faq-section section-space">
        <div class="service-container">
            <div class="faq-grid">
                <div>
                    <span class="section-kicker">Frequently Asked Questions</span>

                    <h2 class="section-title">
                        Service information at a glance.
                    </h2>

                    <p class="section-copy">
                        Common questions related to GPT Group project, channel, technical and service support.
                    </p>
                </div>

                <div class="faq-list">
                    <details class="faq-item" open>
                        <summary>Does GPT Group support complete technology projects?</summary>
                        <p>
                            Yes. Our B2B Project Sales and Pre-Sales Engineering teams can support requirement
                            analysis, BOQ review, product selection, solution design, technical proposals,
                            quotations and product supply.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>Can dealers and resellers work with GPT Group?</summary>
                        <p>
                            Yes. Our Channel Sales division supports dealers and resellers with product access,
                            commercial quotations, stock coordination, technical information, marketing support
                            and partner training.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>What is included in pre-sales engineering?</summary>
                        <p>
                            Pre-sales support may include requirement analysis, site surveys, solution architecture,
                            BOQ preparation, technical proposals, product demonstrations and compliance assistance.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>What support is available after product delivery?</summary>
                        <p>
                            Depending on the product and agreement, support may include product configuration,
                            installation guidance, remote assistance, preventive maintenance, firmware or software
                            updates and on-site support where applicable.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>What services are handled by GPT Care?</summary>
                        <p>
                            GPT Care handles mobile device repair, warranty service, diagnostics, hardware
                            replacement, software recovery, spare parts management, service tracking and RMA coordination.
                        </p>
                    </details>

                    <details class="faq-item">
                        <summary>Is on-site support available for every service?</summary>
                        <p>
                            On-site support depends on the project scope, location, product category, service agreement,
                            warranty conditions and resource availability. The support team will confirm applicability
                            after reviewing the requirement.
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="services-cta">
        <div class="service-container">
            <div class="cta-box">
                <div class="cta-inner">
                    <div>
                        <h2>
                            Planning a project, growing your channel business or looking for service support?
                        </h2>

                        <p>
                            Connect with GPT Group for structured commercial, technical and after-sales assistance.
                        </p>
                    </div>

                    <a href="#service-enquiry" class="gpt-btn gpt-btn-light">
                        Contact Our Team
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection