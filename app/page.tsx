import { PAYMENTS, SERVICES, SITE, STEPS, TOP, TOS } from "./data";
import Prices from "./prices";
import ContactForm from "./contact-form";

const NAV = ["services", "how", "pricing", "terms", "contact"];

function Head({ tag, title }: { tag: string; title: string }) {
  return (
    <div className="mb-12 text-center">
      <p className="text-xs font-bold uppercase tracking-[0.25em] text-acc">{tag}</p>
      <h2 className="mt-2 text-3xl font-extrabold sm:text-4xl">{title}</h2>
    </div>
  );
}

export default function Page() {
  return (
    <>
      <nav className="fixed inset-x-0 top-0 z-50 bg-bg/80 backdrop-blur">
        <div className="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
          <a href="#" className="font-extrabold">Atsumi<span className="text-acc"> Piloting</span></a>
          <div className="hidden gap-6 text-sm text-mut sm:flex">
            {NAV.map((n) => (
              <a key={n} href={`#${n}`} className="capitalize transition hover:text-ink">{n === "how" ? "How it works" : n}</a>
            ))}
          </div>
          <a href={SITE.discord} target="_blank" rel="noopener noreferrer" className="neu-btn !py-2 text-sm">Discord</a>
        </div>
      </nav>

      <main className="mx-auto max-w-6xl space-y-28 px-6 pb-24 pt-36">
        <header className="mx-auto max-w-2xl text-center">
          <h1 className="text-5xl font-extrabold tracking-tight sm:text-7xl">
            Atsumi <span className="text-acc">Piloting</span>
          </h1>
          <p className="mt-6 text-lg text-mut">{SITE.tagline}</p>
          <div className="mt-8 flex flex-wrap justify-center gap-5">
            <a href={SITE.botInvite} target="_blank" rel="noopener noreferrer" className="neu-btn text-acc">Add the bot</a>
            <a href="#pricing" className="neu-btn">View prices</a>
          </div>
          <div className="mt-14 grid grid-cols-3 gap-5 text-sm">
            {[["Hand-played", "no bots, no cheats"], ["Daily proof", "screenshot updates"], ["Bot-managed", "orders via Discord"]].map(([a, b]) => (
              <div key={a} className="neu-in p-4"><strong className="block">{a}</strong><span className="text-mut">{b}</span></div>
            ))}
          </div>
        </header>

        <section id="services">
          <Head tag="What we do" title="Services" />
          <div className="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            {SERVICES.map((s) => (
              <div key={s.t} className="neu neu-hover p-6">
                <h3 className="font-bold">{s.t}</h3>
                <p className="mt-2 text-sm text-mut">{s.d}</p>
              </div>
            ))}
          </div>
        </section>

        <section id="how">
          <Head tag="Powered by Atsumi bot" title="How it works" />
          <div className="grid gap-8 md:grid-cols-3">
            {STEPS.map((s, i) => (
              <div key={s.cmd} className="neu neu-hover p-6">
                <span className="text-sm text-mut">0{i + 1}</span>
                <code className="neu-in mt-2 block px-3 py-2 font-mono text-acc">{s.cmd}</code>
                <p className="mt-3 text-sm text-mut">{s.d}</p>
              </div>
            ))}
          </div>
        </section>

        <section id="pricing">
          <Head tag="Rates" title="Pricing" />
          <Prices />
          <div className="neu-in mt-10 flex flex-wrap items-center justify-between gap-4 p-5 text-sm">
            <p><strong>Rush orders:</strong> <span className="text-mut">+20% of total price for priority completion.</span></p>
            <a href="#contact" className="neu-btn !py-2">Book</a>
          </div>
        </section>

        <section id="terms">
          <Head tag="Policies" title="Terms" />
          <div className="grid gap-8 lg:grid-cols-2">
            <div className="neu p-8">
              <h3 className="mb-4 text-lg font-bold">Terms of Service</h3>
              <dl className="space-y-4 text-sm">
                {TOS.map(([t, d]) => (
                  <div key={t}><dt className="font-semibold text-acc">{t}</dt><dd className="text-mut">{d}</dd></div>
                ))}
              </dl>
            </div>
            <div className="neu p-8">
              <h3 className="mb-4 text-lg font-bold">Terms of Payment</h3>
              <ul className="list-disc space-y-2 pl-5 text-sm text-mut marker:text-acc">
                {TOP.map((t) => <li key={t}>{t}</li>)}
              </ul>
              <div className="mt-6 flex flex-wrap gap-3">
                {PAYMENTS.map((p) => <span key={p} className="neu-in px-3 py-1.5 text-xs font-semibold">{p}</span>)}
              </div>
            </div>
          </div>
        </section>

        <section id="contact" className="mx-auto max-w-xl">
          <Head tag="Get started" title="Request a commission" />
          <ContactForm />
          <p className="mt-6 text-center text-sm text-mut">
            Faster: <a href={SITE.discord} target="_blank" rel="noopener noreferrer" className="text-acc hover:underline">open a ticket on Discord</a>.
          </p>
        </section>
      </main>

      <footer className="py-10 text-center text-sm text-mut">
        © 2026 {SITE.name}
      </footer>
    </>
  );
}
