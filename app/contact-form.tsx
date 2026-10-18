"use client";
import { useState } from "react";
import { SERVICE_OPTIONS } from "./data";

export default function ContactForm() {
  const [state, setState] = useState<"idle" | "sending" | "ok" | "err">("idle");

  async function onSubmit(e: React.FormEvent<HTMLFormElement>) {
    e.preventDefault();
    const form = e.currentTarget;
    setState("sending");
    const res = await fetch("/api/contact", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(Object.fromEntries(new FormData(form))),
    });
    if (res.ok) { form.reset(); setState("ok"); } else setState("err");
  }

  return (
    <form onSubmit={onSubmit} className="neu space-y-5 p-8">
      <input name="name" required maxLength={100} placeholder="Name / alias" className="field" />
      <input name="discord" required maxLength={100} placeholder="Discord username" className="field" />
      <select name="service" required defaultValue="" className="field">
        <option value="" disabled>Select service</option>
        {SERVICE_OPTIONS.map((s) => <option key={s}>{s}</option>)}
      </select>
      <textarea name="message" required rows={4} maxLength={1500} placeholder="Server (Asia/NA/EU), characters, regions, deadline…" className="field" />
      <button disabled={state === "sending"} className="neu-btn w-full text-acc">
        {state === "sending" ? "Sending…" : "Send request"}
      </button>
      {state === "ok" && <p className="text-sm text-emerald-400">Sent. We'll reach you on Discord.</p>}
      {state === "err" && <p className="text-sm text-acc">Failed. Open a ticket on Discord instead.</p>}
    </form>
  );
}
