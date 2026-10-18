<?php
// Database connection for Contact Us (XAMPP MySQL / phpMyAdmin)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "hearth_piloting";

$conn = new mysqli($host, $user, $pass);
if (!$conn->connect_error) {
    $conn->query("CREATE DATABASE IF NOT EXISTS $db");
    $conn->select_db($db);
    $conn->query("CREATE TABLE IF NOT EXISTS contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL,
        commission VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
}

$alert_type = "";
$alert_msg  = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit_contact"])) {
    $name       = trim($_POST["name"] ?? "");
    $email      = trim($_POST["email"] ?? "");
    $commission = trim($_POST["commission"] ?? "");
    $message    = trim($_POST["message"] ?? "");

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, commission, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $commission, $message);
        if ($stmt->execute()) {
            $alert_type = "success";
            $alert_msg  = "Thank you! Your commission inquiry has been submitted. You can also message us directly on Discord, Facebook, or Instagram for instant response!";
        } else {
            $alert_type = "danger";
            $alert_msg  = "Unable to save inquiry. Please try again or reach out on our Discord.";
        }
        $stmt->close();
    } else {
        $alert_type = "warning";
        $alert_msg  = "Please fill in all required fields with a valid email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hearth Piloting Agency | Fast & Trusted Filipino Genshin Piloting</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <!-- Google Fonts: Pirata One & Karla -->
  <link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Karla:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- 1. Top Bar / Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="#home">Hearth <span>Piloting</span> Agency</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-items-center gap-lg-2">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#terms">Terms</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
          <li class="nav-item ms-lg-2">
            <a href="https://discord.gg/Xp2V3aCcq" target="_blank" rel="noopener noreferrer" class="btn btn-ember btn-sm">Discord</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 2. Home Section (Hero with Filipino Identity & No Blank Space) -->
  <header id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="flag-badge">&#127477;&#127469; Fast &amp; Trusted Filipino Piloting Team</span>
          <h1>Hearth<small>Piloting Agency</small></h1>
          <p class="lead-text mt-4">
            Professional Genshin Impact piloting by experienced Filipino gamers. We handle your account map exploration, primogem hunting, quest clearances, and material farming with 100% hand-played dedication and fast delivery.
          </p>
          <div class="d-flex flex-wrap gap-3 mt-4">
            <a href="#pricing" class="btn btn-ember btn-lg px-4">View Our Prices</a>
            <a href="#contact" class="btn btn-ghost btn-lg px-4">Contact Our Pilots</a>
          </div>
          <div class="row g-4 mt-4">
            <div class="col-4 stat"><strong>100% Filipino</strong>fast &amp; trusted</div>
            <div class="col-4 stat"><strong>Hand-Played</strong>zero bots or cheats</div>
            <div class="col-4 stat"><strong>Daily Proofs</strong>live screenshot updates</div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- 3. Services Section -->
  <section id="services">
    <div class="container">
      <span class="section-tag text-center d-block">What We Offer</span>
      <h2 class="mb-2 text-center">Our Piloting Services</h2>
      <p class="mb-5 text-ash text-center mx-auto" style="max-width: 650px;">
        High-efficiency in-game progression for busy Travelers. We take on the grind so you can enjoy the characters and lore you love.
      </p>
      <div class="row g-4">
        <!-- Service 1 -->
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <h3>Exploring Map Account</h3>
            <p>100% regional map completion across all nations, unlocking every teleport waypoint, statue, oculi, and hidden chest.</p>
            <a href="#pricing" class="mt-auto text-ember fw-bold text-decoration-none">View Exploration Rates &rarr;</a>
          </div>
        </div>
        <!-- Service 2 -->
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <h3>Hunting Primogems</h3>
            <p>Daily commissions, 36-star Spiral Abyss full clears, resin burn, and event completions so you never miss precious banner wishes.</p>
            <a href="#pricing" class="mt-auto text-ember fw-bold text-decoration-none">View Primogem Rates &rarr;</a>
          </div>
        </div>
        <!-- Service 3 -->
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <h3>Doing Quests</h3>
            <p>Swift clearance of lengthy Archon Quests, complex World Quest chains, and character Story Quests while keeping your account safe.</p>
            <a href="#pricing" class="mt-auto text-ember fw-bold text-decoration-none">View Quest Rates &rarr;</a>
          </div>
        </div>
        <!-- Service 4 -->
        <div class="col-md-6 col-lg-3">
          <div class="service-card">
            <h3>Collecting Materials</h3>
            <p>Targeted gathering of character ascension specialties, weekly boss drops, weapon materials, and optimized artifact domain farming.</p>
            <a href="#pricing" class="mt-auto text-ember fw-bold text-decoration-none">View Farming Rates &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Pricing Section (HPA Official Price Sheet) -->
  <section id="pricing" class="alt">
    <div class="container">
      <span class="section-tag text-center d-block">HPA Official Rates</span>
      <h2 class="mb-2 text-center">Service Prices</h2>
      <p class="mb-4 text-ash text-center mx-auto" style="max-width: 650px;">
        Transparent, affordable piloting rates. All prices are negotiable.
      </p>

      <!-- Category Filter Pills -->
      <div class="price-pill-nav">
        <button class="price-pill-btn active" onclick="switchTab('tab-quests', this)">Quests &amp; Events</button>
        <button class="price-pill-btn" onclick="switchTab('tab-exploration', this)">Exploration &amp; Oculi</button>
        <button class="price-pill-btn" onclick="switchTab('tab-maintenance', this)">Maintenance &amp; Character</button>
        <a href="images/prices-sheet.png" target="_blank" class="price-pill-btn text-decoration-none">&#128065; View Original Price Sheet</a>
      </div>

      <!-- Tab 1: Quests & Events -->
      <div id="tab-quests" class="price-tab-content">
        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Archon Quests</h4>
              <small class="text-ash d-block mb-2">Price per Act</small>
              <table class="price-table">
                <tr><td class="p-name">Mondstadt</td><td class="p-val">$1.00</td></tr>
                <tr><td class="p-name">Liyue</td><td class="p-val">$1.00</td></tr>
                <tr><td class="p-name">Inazuma</td><td class="p-val">$1.65</td></tr>
                <tr><td class="p-name">Sumeru</td><td class="p-val">$1.80</td></tr>
                <tr><td class="p-name">Fontaine</td><td class="p-val">$2.00</td></tr>
                <tr><td class="p-name">Natlan</td><td class="p-val">$2.30</td></tr>
                <tr><td class="p-name">Nod Krai</td><td class="p-val">$2.50</td></tr>
                <tr><td class="p-name">Snezhnaya</td><td class="p-val">$3.00</td></tr>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Story &amp; World Quests</h4>
              <small class="text-ash d-block mb-2">Individual Quest Clear</small>
              <table class="price-table">
                <tr><td class="p-name">Story Quest</td><td class="p-val">$2.00</td></tr>
                <tr><td class="p-name">Hangouts (All Endings)</td><td class="p-val">$1.80</td></tr>
                <tr><td class="p-name">Side Quest</td><td class="p-val">$0.80</td></tr>
                <tr><td class="p-name">World Quests</td><td class="p-val">$2.00 &ndash; $6.00</td></tr>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Time-Limited Events</h4>
              <small class="text-ash d-block mb-2">Full Event Rewards</small>
              <table class="price-table">
                <tr><td class="p-name">Short Events</td><td class="p-val">$2.50</td></tr>
                <tr><td class="p-name">Main Flagship Event</td><td class="p-val">$4.50</td></tr>
                <tr><td class="p-name">Spiral Abyss (Floor 9&ndash;12)</td><td class="p-val">Inquire</td></tr>
                <tr><td class="p-name">Imaginarium Theater</td><td class="p-val">Inquire</td></tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab 2: Exploration & Oculi -->
      <div id="tab-exploration" class="price-tab-content d-none">
        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Main Exploration</h4>
              <small class="text-ash d-block mb-2">Whole Region w/ All Oculi</small>
              <table class="price-table">
                <tr><td class="p-name">Mondstadt</td><td class="p-val">$9.54</td></tr>
                <tr><td class="p-name">Liyue</td><td class="p-val">$19.07</td></tr>
                <tr><td class="p-name">Inazuma</td><td class="p-val">$28.61</td></tr>
                <tr><td class="p-name">Sumeru (with Desert)</td><td class="p-val">$85.00</td></tr>
                <tr><td class="p-name">Fontaine</td><td class="p-val">$45.00</td></tr>
                <tr><td class="p-name">Natlan</td><td class="p-val">$55.00</td></tr>
                <tr><td class="p-name">Nod Krai</td><td class="p-val">$50.00</td></tr>
                <tr><td class="p-name">Snezhnaya</td><td class="p-val">$40.50</td></tr>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Special Area Exploration</h4>
              <small class="text-ash d-block mb-2">Special Region w/ Oculi</small>
              <table class="price-table">
                <tr><td class="p-name">Dragonspine</td><td class="p-val">$9.20</td></tr>
                <tr><td class="p-name">Windest Peak</td><td class="p-val">$6.50</td></tr>
                <tr><td class="p-name">Temple of Space</td><td class="p-val">$9.72</td></tr>
                <tr><td class="p-name">Chasm (w/ Underground)</td><td class="p-val">$19.45</td></tr>
                <tr><td class="p-name">Chenyu Vale</td><td class="p-val">$16.20</td></tr>
                <tr><td class="p-name">Enkanomiya</td><td class="p-val">$15.00</td></tr>
                <tr><td class="p-name">Sea of Bygone Eras</td><td class="p-val">$16.47</td></tr>
                <tr><td class="p-name">Ancient Sacred Mountain</td><td class="p-val">$19.00</td></tr>
                <tr><td class="p-name">Frost Moon</td><td class="p-val">$10.50</td></tr>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Oculi Collection</h4>
              <small class="text-ash d-block mb-2">Per Piece Gathering</small>
              <table class="price-table">
                <tr><td class="p-name">Anemoculus / Geoculus</td><td class="p-val">$0.05 / pc</td></tr>
                <tr><td class="p-name">Electroculus / Dendroculus</td><td class="p-val">$0.07 / pc</td></tr>
                <tr><td class="p-name">Hydroculus / Pyroculus</td><td class="p-val">$0.07 / pc</td></tr>
                <tr><td class="p-name">Lunoculus / Cryoculus</td><td class="p-val">$0.07 / pc</td></tr>
                <tr><td class="p-name">Crimson Agate / Lumenspar</td><td class="p-val">$0.08 / pc</td></tr>
                <tr><td class="p-name">Purify Plum / Spirit Carp</td><td class="p-val">$0.10 / pc</td></tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab 3: Maintenance & Character -->
      <div id="tab-maintenance" class="price-tab-content d-none">
        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Account Maintenance</h4>
              <small class="text-ash d-block mb-2">Dailies, Resin, Reputation, Events</small>
              <table class="price-table">
                <tr><td class="p-name">Daily Account Care (Per Day)</td><td class="p-val">$1.80</td></tr>
                <tr><td class="p-name">Weekly Bundle (7 Days)</td><td class="p-val">$11.50</td></tr>
                <tr><td class="p-name">Monthly Bundle (30 Days)</td><td class="p-val">$48.00</td></tr>
                <tr><td class="p-name">Wishes Service (Per 10 Pulls)</td><td class="p-val">$5.00</td></tr>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Material Farming</h4>
              <small class="text-ash d-block mb-2">Max 200 pcs per session</small>
              <table class="price-table">
                <tr><td class="p-name">Local Specialties (50 pcs)</td><td class="p-val">$1.00</td></tr>
                <tr><td class="p-name">Ascension Mats (100 pcs)</td><td class="p-val">$2.00</td></tr>
                <tr><td class="p-name">Full Stock (200 pcs)</td><td class="p-val">$4.00</td></tr>
                <tr><td class="p-name">Boss Drops (Per Run)</td><td class="p-val">Negotiable</td></tr>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="price-box">
              <h4>Character Maintenance</h4>
              <small class="text-ash d-block mb-2">Per Character / Per Ascension</small>
              <table class="price-table">
                <tr><td class="p-name">Character Ascend</td><td class="p-val">$1.50</td></tr>
                <tr><td class="p-name">Weapon Upgrade</td><td class="p-val">$1.50</td></tr>
                <tr><td class="p-name">Talent Leveling</td><td class="p-val">$2.50</td></tr>
                <tr><td class="p-name">Full Character Building</td><td class="p-val">$5.00</td></tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Rush Commission Banner -->
      <div class="rush-banner d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div>
          <strong class="text-white d-block">&#9889; Rush Commissions Available:</strong>
          <span class="text-ash small">Subject to a 20% rush fee on the total commission price for urgent priority completion.</span>
        </div>
        <a href="#contact" class="btn btn-ember btn-sm">Book a Commission</a>
      </div>
    </div>
  </section>

  <!-- 5. About Us Section (Proud Filipino Identity) -->
  <section id="about">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-5">
          <img src="images/banner.png" class="img-fluid rounded border border-danger border-opacity-25" alt="Hearth Piloting Agency banner">
        </div>
        <div class="col-lg-7">
          <span class="section-tag">&#127477;&#127469; Filipino Piloting Agency</span>
          <h2 class="mb-3">Who We Are</h2>
          <p>
            <strong>Hearth Piloting Agency</strong> is a trusted gaming concierge run by passionate, skilled Filipino pilots. We specialize exclusively in Genshin Impact account progression for Travelers worldwide who need fast, honest, and reliable results.
          </p>
          <p>
            Every single commission is <strong>100% hand-played</strong>. We hold an uncompromising zero-tolerance policy against automation, third-party injectors, macros, and speed hacks. Our pilots are seasoned Genshin veterans who understand optimal team rotations, chest routing, and resin economy.
          </p>
          <p>
            Your account's safety and privacy are guaranteed: your Primogems, Intertwined Fates, 5-star weapons, and artifacts will remain completely untouched unless you explicitly ask us to build them. We deliver prompt daily progress screenshots so you are always updated.
          </p>
          <div class="d-flex flex-wrap gap-3 mt-4">
            <a href="https://discord.gg/Xp2V3aCcq" target="_blank" rel="noopener noreferrer" class="btn btn-ember">Join Discord Server</a>
            <a href="https://www.facebook.com/profile.php?id=61594654081114" target="_blank" rel="noopener noreferrer" class="btn btn-ghost">Message on Facebook</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. Terms & Agreements Section (HPA TOS & TOP) -->
  <section id="terms" class="alt">
    <div class="container">
      <span class="section-tag text-center d-block">HPA Policies</span>
      <h2 class="mb-2 text-center">Terms &amp; Agreements</h2>
      <p class="mb-5 text-ash text-center mx-auto" style="max-width: 650px;">
        Please review our Terms of Service (TOS) and Terms of Payment (TOP) before booking a pilot.
      </p>

      <div class="row g-4">
        <!-- Terms of Service (TOS) -->
        <div class="col-lg-6">
          <div class="terms-card">
            <h3>Terms of Service (HPA TOS)</h3>
            
            <div class="terms-section-title">Agreement</div>
            <p class="text-ash small">
              Once you pay, it means you agree to our Terms of Service. By sending payment, you acknowledge and accept all policies, rules, and conditions stated by Hearth Piloting Agency.
            </p>

            <div class="terms-section-title">Rush Commissions</div>
            <p class="text-ash small">
              Rush commissions are subject to an additional 20% rush fee based on the total commission price.<br>
              <strong class="text-white">Total Commission Price + 20% Rush Fee = Final Price</strong>
            </p>

            <div class="terms-section-title">Client Responsibilities</div>
            <p class="text-ash small">
              Clients are expected to provide accurate information and follow instructions given by our staff. Please avoid making changes or logging into the account during ongoing commissions without team permission.
            </p>

            <div class="terms-section-title">Completion &amp; Delays</div>
            <p class="text-ash small">
              Estimated completion times may vary depending on commission workload and account conditions. Unexpected delays will be communicated promptly.
            </p>

            <div class="terms-section-title">Agreement Confirmation</div>
            <p class="text-ash small mb-0">
              By making any payment, you confirm that you have had the opportunity to read these Terms of Service and fully agree to abide by them.<br>
              <strong class="text-ember">Payment = Agreement to Terms of Service.</strong>
            </p>
          </div>
        </div>

        <!-- Terms of Payment (TOP) -->
        <div class="col-lg-6">
          <div class="terms-card">
            <h3>Terms of Payment (HPA TOP)</h3>
            
            <ul class="terms-list">
              <li>All prices are still negotiable.</li>
              <li>Please double-check all account details before providing them to us.</li>
              <li>Payments may be non-refundable once the commission has started, unless otherwise stated by our staff.</li>
              <li>We will not be responsible for issues caused by incorrect information provided by the client.</li>
              <li><strong>50% down payment</strong> is required before the service begins. The remaining 50% must be paid before the service is fully completed.</li>
              <li>Full payments are also greatly appreciated.</li>
              <li>For rush commissions, clients will be required to pay an additional 20% rush fee on top of the overall commission price.</li>
            </ul>

            <div class="terms-section-title mt-4">Accepted Modes of Payment</div>
            <div class="payment-badges-wrap">
              <span class="payment-pill">&#128179; PayPal</span>
              <span class="payment-pill">&#128241; GCash</span>
              <span class="payment-pill">&#129309; Remitly</span>
              <span class="payment-pill">&#127974; Bank Transfer / SeaBank</span>
            </div>

            <div class="mt-4 pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center">
              <span class="text-ash small">Have questions about pricing?</span>
              <a href="images/tos-sheet.png" target="_blank" class="btn btn-ghost btn-sm">&#128065; View TOS Sheet</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 7. Contact Us Section (Direct Social Links & Inquiry Form) -->
  <section id="contact">
    <div class="container">
      <span class="section-tag text-center d-block">Get In Touch</span>
      <h2 class="mb-2 text-center">Contact Our Pilots</h2>
      <p class="mb-5 text-ash text-center mx-auto" style="max-width: 650px;">
        Connect with us directly on your preferred social platform for instant booking, or send an inquiry below.
      </p>

      <!-- Direct Social Channels -->
      <div class="row g-4 mb-5">
        <div class="col-md-4">
          <a href="https://discord.gg/Xp2V3aCcq" target="_blank" rel="noopener noreferrer" class="social-card">
            <div class="social-icon icon-discord">&#128172;</div>
            <div>
              <h4>Discord Server</h4>
              <p>Join our community &amp; open a ticket</p>
              <small class="text-ember fw-bold">discord.gg/Xp2V3aCcq</small>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="https://www.facebook.com/profile.php?id=61594654081114" target="_blank" rel="noopener noreferrer" class="social-card">
            <div class="social-icon icon-fb">&#128227;</div>
            <div>
              <h4>Facebook Page</h4>
              <p>Direct chat on Messenger</p>
              <small class="text-ember fw-bold">Hearth Piloting Agency</small>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="https://www.instagram.com/cypilots/" target="_blank" rel="noopener noreferrer" class="social-card">
            <div class="social-icon icon-ig">&#128247;</div>
            <div>
              <h4>Instagram</h4>
              <p>Follow &amp; message our pilots</p>
              <small class="text-ember fw-bold">@cypilots</small>
            </div>
          </a>
        </div>
      </div>

      <!-- Quick Message Form -->
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="p-4 rounded bg-panel border border-danger border-opacity-25">
            <h3 class="mb-3 text-white">Send a Commission Message</h3>
            <p class="text-ash small mb-4">Leave your details and what service you are inquiring about.</p>

            <?php if (!empty($alert_msg)): ?>
              <div class="alert alert-<?= htmlspecialchars($alert_type) ?> alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($alert_msg) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <form action="index.php#contact" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label text-white">Full Name / Alias</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="100" placeholder="e.g. Lumine / Aether" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label text-white">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="150" placeholder="e.g. traveler@example.com" required>
              </div>
              <div class="mb-3">
                <label for="commission" class="form-label text-white">What Commission Do You Need?</label>
                <select class="form-select" id="commission" name="commission" required>
                  <option value="" selected disabled>Select your desired service</option>
                  <option value="Archon Quests">Archon Quests ($1 - $3 / Act)</option>
                  <option value="Story & World Quests">Story / World Quests ($2 - $6)</option>
                  <option value="Regional Exploration">Regional Exploration ($9.54 - $85)</option>
                  <option value="Special Area Exploration">Special Area Exploration ($6.50 - $19.45)</option>
                  <option value="Oculi Collection">Oculi Collection ($0.05 - $0.10 / pc)</option>
                  <option value="Account Maintenance">Account Maintenance ($1.80 / Day)</option>
                  <option value="Material Farming">Material Farming ($1 / 50 pcs)</option>
                  <option value="Character Maintenance">Character Building & Ascension ($1.50 - $5)</option>
                  <option value="Custom Request">Custom Commission</option>
                </select>
              </div>
              <div class="mb-4">
                <label for="message" class="form-label text-white">Commission Details</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Specify your server (Asia/NA/EU), target characters, regions, or deadline..." required></textarea>
              </div>
              <button type="submit" name="submit_contact" class="btn btn-ember btn-lg w-100">Send Commission Request</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">
      <div>
        <h5 class="navbar-brand mb-0">Hearth <span>Piloting</span> Agency</h5>
        <p class="small text-ash mb-0">&copy; 2026 Hearth Piloting Agency. Fast &amp; Trusted Filipino Piloting Services.</p>
      </div>
      <div class="d-flex gap-3">
        <a href="https://discord.gg/Xp2V3aCcq" target="_blank" rel="noopener noreferrer">Discord</a>
        <a href="https://www.facebook.com/profile.php?id=61594654081114" target="_blank" rel="noopener noreferrer">Facebook</a>
        <a href="https://www.instagram.com/cypilots/" target="_blank" rel="noopener noreferrer">Instagram</a>
      </div>
    </div>
  </footer>

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <!-- Interactive Price Tabs Script -->
  <script>
    function switchTab(tabId, btn) {
      document.querySelectorAll('.price-tab-content').forEach(el => el.classList.add('d-none'));
      document.getElementById(tabId).classList.remove('d-none');
      document.querySelectorAll('.price-pill-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }
  </script>

</body>
</html>
