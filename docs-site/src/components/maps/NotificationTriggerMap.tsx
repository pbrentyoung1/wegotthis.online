const flowStages = [
  {
    title: "System Event",
    detail: "Project assignment, approval request, comment, due date warning, file upload, or magic-link action.",
  },
  {
    title: "Trigger Rules",
    detail: "Rules decide whether the event matters enough to notify someone or only belong in history.",
  },
  {
    title: "Audience Resolver",
    detail: "The system finds the right people: assignee, owner, reviewer, requester, admin, or watcher.",
  },
  {
    title: "Channel Strategy",
    detail: "In-app, email, future push or SMS, or digest depending on urgency and preference.",
  },
  {
    title: "Notification Log",
    detail: "Sent, batched, delivered, and read states are recorded without making notifications the source of truth.",
  },
];

const events = [
  "Project assigned",
  "Deliverable assigned",
  "Task assigned",
  "Approval requested",
  "Changes requested",
  "Comment or mention",
  "Due date approaching",
  "Due date missed",
  "Magic link action completed",
];

export default function NotificationTriggerMap() {
  return (
    <div className="bg-[#F7F9FB] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="space-y-4">
          <div className="grid gap-4 lg:grid-cols-5">
            {flowStages.map((stage, index) => (
              <div key={stage.title} className="space-y-3">
                <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-white p-4 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Step {index + 1}</p>
                  <h3 className="mt-2 text-lg font-semibold tracking-tight text-[#25313A]">{stage.title}</h3>
                  <p className="mt-2 text-sm leading-relaxed text-[#66737B]">{stage.detail}</p>
                </div>
                {index < flowStages.length - 1 && (
                  <div className="hidden justify-center lg:flex">
                    <div className="rounded-full border border-[#D8E1E6] bg-[#F7FAFB] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.22em] text-[#568FA7]">
                      next
                    </div>
                  </div>
                )}
              </div>
            ))}
          </div>

          <div className="grid gap-4 lg:grid-cols-[1.1fr_0.9fr]">
            <div className="rounded-[1.4rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Common Trigger Events</p>
              <div className="mt-3 flex flex-wrap gap-3">
                {events.map((event, index) => (
                  <div
                    key={event}
                    className={`rounded-full border px-4 py-2 text-sm font-medium ${
                      index === 3 || index === 4 || index === 7
                        ? "border-[#E0916C] bg-[#FFF4EE] text-[#25313A]"
                        : "border-[#D8E1E6] bg-[#FBFCFD] text-[#25313A]"
                    }`}
                  >
                    {event}
                  </div>
                ))}
              </div>
            </div>

            <div className="rounded-[1.4rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Audience + Channel</p>
              <div className="mt-3 grid gap-3 md:grid-cols-2">
                <div className="rounded-2xl border border-[#D8E1E6] bg-[#FBFCFD] px-4 py-3 text-sm text-[#25313A]">
                  Assignee, owner, reviewer, requester, admin, watchers
                </div>
                <div className="rounded-2xl border border-[#F1C7B2] bg-[#FFF4EE] px-4 py-3 text-sm text-[#25313A]">
                  In-app, email, digest, and future push or SMS
                </div>
              </div>
              <p className="mt-4 text-sm leading-relaxed text-[#66737B]">
                Urgency determines delivery speed. Preferences decide whether the event is immediate, batched, or suppressed.
              </p>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[#25313A] p-6 text-white shadow-[0_12px_30px_rgba(37,49,58,0.12)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[#A9CBD8]">Core Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Notifications are derived from events</p>
              <p className="mt-1 text-slate-300">The event is primary. The notification is only one delivery outcome.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Delivery is preference-aware</p>
              <p className="mt-1 text-slate-300">People should receive what matters through the channels they actually want.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Urgency determines channel</p>
              <p className="mt-1 text-slate-300">Not every event deserves an immediate interruptive delivery path.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Noise reduction is required</p>
              <p className="mt-1 text-slate-300">Reducing needless alerts is a product principle, not just a settings concern.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
