const states = [
  "Draft",
  "In Production",
  "Internal Review",
  "Approved",
  "Prepared",
  "Sent / Scheduled",
  "Fulfilled",
  "Installed / Published",
  "Completed",
  "Archived",
];

export default function DeliverableLifecycleMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_320px]">
        <div className="rounded-[1.5rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
          <div className="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
            {states.map((state) => (
              <div
                key={state}
                className={[
                  "rounded-2xl border px-4 py-4 text-sm font-semibold shadow-sm",
                  state === "Prepared"
                    ? "border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] text-[var(--text-strong)]"
                    : state === "Installed / Published"
                      ? "border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)] text-[var(--text-strong)]"
                      : "border-[var(--border-soft)] bg-[var(--surface-soft)] text-[var(--text-strong)]",
                ].join(" ")}
              >
                {state}
              </div>
            ))}
          </div>

          <div className="mt-6 rounded-[1.25rem] border border-dashed border-[var(--border-soft)] bg-[var(--surface-soft)] px-5 py-4">
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Real-world verification</p>
            <p className="mt-2 text-sm leading-relaxed text-[var(--text-body)]">
              Deliverables are complete only after they are verified in the real world, not merely approved in the system.
            </p>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Lifecycle Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Approved does not equal Done</p>
              <p className="mt-1 text-slate-300">Approval only confirms readiness for the next operational step.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Prepared is its own state</p>
              <p className="mt-1 text-slate-300">Files often need packaging or setup before they can be sent or scheduled.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Fulfillment varies by type</p>
              <p className="mt-1 text-slate-300">A print job, social post, signage install, and web asset complete differently.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
