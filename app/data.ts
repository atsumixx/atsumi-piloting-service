export const SITE = {
  name: "Atsumi Piloting Service",
  tagline: "Genshin Impact piloting, run end to end through one Discord bot.",
  discord: "https://discord.gg/Jd8srJv96",
};

export const SERVICES = [
  { t: "Exploration", d: "100% regional completion: waypoints, statues, oculi, chests." },
  { t: "Primogems", d: "Dailies, Abyss clears, resin burn and event rewards." },
  { t: "Quests", d: "Archon, World and Story Quest chains, cleared safely." },
  { t: "Materials", d: "Ascension, talent and weapon material farming." },
];

// TODO: match these to your bot's real slash commands
export const STEPS = [
  { cmd: "/prices", d: "Live rates, always in sync with this page." },
  { cmd: "/order", d: "Choose a service. A private ticket opens for you and your pilot." },
  { cmd: "/status", d: "Track progress and receive proof screenshots in your ticket." },
  { cmd: "/pay", d: "Get payment details and confirm your 50% down payment." },
];

// Mock of the bot's ticket embed shown on the site. Edit to mirror the real one.
export const PREVIEW = {
  title: "Order #0042 · Fontaine Exploration",
  rows: [["Status", "In progress"], ["Pilot", "Atsumi"], ["Progress", "62%"], ["Payment", "50% paid"]] as [string, string][],
  log: ["Oculi batch 2 collected", "Waypoints unlocked: 41/66", "Proof screenshot attached"],
};

type Box = { title: string; sub: string; rows: [string, string][] };
export const PRICES: { id: string; label: string; boxes: Box[] }[] = [
  {
    id: "quests",
    label: "Quests & Events",
    boxes: [
      { title: "Archon Quests", sub: "Per act", rows: [
        ["Mondstadt", "$1.00"], ["Liyue", "$1.00"], ["Inazuma", "$1.65"], ["Sumeru", "$1.80"],
        ["Fontaine", "$2.00"], ["Natlan", "$2.30"], ["Nod Krai", "$2.50"], ["Snezhnaya", "$3.00"],
      ]},
      { title: "Story & World", sub: "Per quest", rows: [
        ["Story Quest", "$2.00"], ["Hangouts (all endings)", "$1.80"], ["Side Quest", "$0.80"], ["World Quests", "$2.00 – $6.00"],
      ]},
      { title: "Events", sub: "Full rewards", rows: [
        ["Short Events", "$2.50"], ["Main Flagship Event", "$4.50"], ["Spiral Abyss (9–12)", "Inquire"], ["Imaginarium Theater", "Inquire"],
      ]},
    ],
  },
  {
    id: "exploration",
    label: "Exploration",
    boxes: [
      { title: "Main Exploration", sub: "Whole region + all oculi", rows: [
        ["Mondstadt", "$9.54"], ["Liyue", "$19.07"], ["Inazuma", "$28.61"], ["Sumeru (w/ Desert)", "$85.00"],
        ["Fontaine", "$45.00"], ["Natlan", "$55.00"], ["Nod Krai", "$50.00"], ["Snezhnaya", "$40.50"],
      ]},
      { title: "Special Areas", sub: "Region + oculi", rows: [
        ["Dragonspine", "$9.20"], ["Windrise Peak", "$6.50"], ["Temple of Space", "$9.72"], ["Chasm (w/ Underground)", "$19.45"],
        ["Chenyu Vale", "$16.20"], ["Enkanomiya", "$15.00"], ["Sea of Bygone Eras", "$16.47"],
        ["Ancient Sacred Mountain", "$19.00"], ["Frost Moon", "$10.50"],
      ]},
      { title: "Oculi", sub: "Per piece", rows: [
        ["Anemoculus / Geoculus", "$0.05"], ["Electro / Dendro", "$0.07"], ["Hydro / Pyro", "$0.07"],
        ["Lunoculus / Cryo", "$0.07"], ["Crimson Agate / Lumenspar", "$0.08"], ["Purify Plum / Spirit Carp", "$0.10"],
      ]},
    ],
  },
  {
    id: "maintenance",
    label: "Maintenance",
    boxes: [
      { title: "Account Care", sub: "Dailies, resin, reputation", rows: [
        ["Per day", "$1.80"], ["Weekly (7d)", "$11.50"], ["Monthly (30d)", "$48.00"], ["Wishes (per 10 pulls)", "$5.00"],
      ]},
      { title: "Material Farming", sub: "Max 200 pcs / session", rows: [
        ["Local Specialties (50)", "$1.00"], ["Ascension Mats (100)", "$2.00"], ["Full Stock (200)", "$4.00"], ["Boss Drops (per run)", "Negotiable"],
      ]},
      { title: "Characters", sub: "Per character", rows: [
        ["Ascend", "$1.50"], ["Weapon Upgrade", "$1.50"], ["Talent Leveling", "$2.50"], ["Full Build", "$5.00"],
      ]},
    ],
  },
];

export const SERVICE_OPTIONS = [
  "Archon Quests", "Story & World Quests", "Regional Exploration", "Special Area Exploration",
  "Oculi Collection", "Account Maintenance", "Material Farming", "Character Building", "Custom",
];

export const TOS = [
  ["Agreement", "Payment means you accept these terms."],
  ["Rush", "+20% of total commission price."],
  ["Client duties", "Give accurate info. Don't log in during an active commission without permission."],
  ["Delays", "Times vary by workload and account state. Delays are communicated promptly."],
];
export const TOP = [
  "Prices are negotiable.",
  "Double-check account details before sending.",
  "Payments may be non-refundable once started.",
  "Not responsible for issues from incorrect client info.",
  "50% down before start, 50% before completion. Full payment welcome.",
  "Rush orders: +20%.",
];
export const PAYMENTS = ["PayPal", "GCash", "Wise"];
