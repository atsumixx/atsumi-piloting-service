import { NextResponse } from "next/server";

export async function POST(req: Request) {
  const { name, discord, service, message } = await req.json().catch(() => ({}));
  if (![name, discord, service, message].every((v) => typeof v === "string" && v.trim()))
    return NextResponse.json({ error: "invalid" }, { status: 400 });

  const hook = process.env.DISCORD_WEBHOOK_URL;
  if (!hook) return NextResponse.json({ error: "config" }, { status: 500 });

  const r = await fetch(hook, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      embeds: [{
        title: "New commission inquiry",
        color: 0xc2272d,
        fields: [
          { name: "Name", value: name.slice(0, 100) },
          { name: "Discord", value: discord.slice(0, 100) },
          { name: "Service", value: service.slice(0, 100) },
          { name: "Details", value: message.slice(0, 1000) },
        ],
        timestamp: new Date().toISOString(),
      }],
    }),
  });
  return NextResponse.json({ ok: r.ok }, { status: r.ok ? 200 : 502 });
}
