"use client";
import { useState } from "react";
import { PRICES } from "./data";

export default function Prices() {
  const [tab, setTab] = useState(PRICES[0].id);
  const active = PRICES.find((p) => p.id === tab)!;
  return (
    <>
      <div className="mb-10 flex flex-wrap justify-center gap-4">
        {PRICES.map((p) => (
          <button key={p.id} className="neu-btn" data-active={tab === p.id} onClick={() => setTab(p.id)}>
            {p.label}
          </button>
        ))}
      </div>
      <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        {active.boxes.map((b) => (
          <div key={b.title} className="neu neu-hover p-6">
            <h3 className="text-lg font-bold">{b.title}</h3>
            <p className="mb-4 text-sm text-mut">{b.sub}</p>
            <ul className="space-y-2 text-sm">
              {b.rows.map(([n, v]) => (
                <li key={n} className="flex justify-between gap-4 border-b border-white/5 pb-2 last:border-0">
                  <span className="text-mut">{n}</span>
                  <span className="whitespace-nowrap font-semibold">{v}</span>
                </li>
              ))}
            </ul>
          </div>
        ))}
      </div>
    </>
  );
}
