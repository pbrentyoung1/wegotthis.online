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
    <div className="bg-[#F7F9FB] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_320px]">
        <div className="rounded-[1.5rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
          <div className="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
            {states.map((state) => (
              <div
                key={state}
                className={[
                  "rounded-2xl border px-4 py-4 text-sm font-semibold shadow-sm",
                  state === "Prepared"
                    ? "border-[#E0916C] bg-[#FFF4EE] text-[#25313A]"
                    : state === "Installed / Published"
                      ? "border-[#568FA7] bg-[#EAF2F5] text-[#25313A]"
                      : "border-[#D8E1E6] bg-[#FBFCFD] text-[#25313A]",
                ].join(" ")}
              >
                {state}
              </div>
            ))}
          </div>

          <div className="mt-6 rounded-[1.25rem] border border-dashed border-[#D8E1E6] bg-[#FBFCFD] px-5 py-4">
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Real-world verification</p>
            <p className="mt-2 text-sm leading-relaxed text-[#48535A]">
              Deliverables are complete only after they are verified in the real world, not merely approved in the system.
            </p>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[#25313A] p-6 text-white shadow-[0_12px_30px_rgba(37,49,58,0.12)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[#A9CBD8]">Lifecycle Rules</p>
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
