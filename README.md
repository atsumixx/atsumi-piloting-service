# Hearth Piloting Agency

A single-page website for **Hearth Piloting Agency** built with **Bootstrap 5** and **PHP / MySQL** for XAMPP.

## Overview
- **Single-Page Design**: Navigation Bar, Home (Hero with custom Arlecchino banner), Services, Products, About Us, and Contact Us.
- **Three-Color Palette**: Obsidian Dark (`#140709`), Ember Red (`#c2141f`), and Platinum Silver (`#e9e4e6`).
- **Genshin Impact Services**:
  - Exploring Map Account (100% regional completion)
  - Hunting Primogems (Daily Commissions, Spiral Abyss, Events)
  - Doing Quests (Archon, World, and Story Quests)
  - Collecting Materials (Ascension, Talent, and Domain farming)
- **Products**: Genesis Crystals packages (60, 980, 6,480) and Blessing of the Welkin Moon with PHP pricing.
- **Contact Us Database**: Submissions are automatically recorded into MySQL (`hearth_piloting` database, `contacts` table).

## Quick Start (XAMPP)
1. Place this project folder into `C:\xampp\htdocs\hearth-piloting`.
2. Start **Apache** and **MySQL** in your XAMPP Control Panel.
3. Open your browser:
   ```
   http://localhost/hearth-piloting/
   ```
4. Check submitted contact inquiries in **phpMyAdmin**:
   ```
   http://localhost/phpmyadmin/ (Database: hearth_piloting -> Table: contacts)
   ```
