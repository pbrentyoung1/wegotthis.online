const steps = [
  {
    title: "Submit for Review",
    detail: "Creator sends a deliverable version into the review flow.",
    tone: "blue",
  },
  {
    title: "Internal Review",
    detail: "An internal reviewer checks fit, clarity, and readiness.",
    tone: "blue",
  },
  {
    title: "Changes Requested",
    detail: "Work loops back to production when internal or stakeholder review finds issues.",
    tone: "coral",
  },
  {
    title: "Stakeholder Review",
    detail: "Optional ministry or external review may happen through scoped access.",
    tone: "blue",
  },
  {
    title: "Final Approved",
    detail: "Approval is version-specific and clears the deliverable for fulfillment.",
    tone: "blue",
  },
  {
    title: "Prepared / Sent / Scheduled",
    detail: "Approved work moves into operational fulfillment, not automatic completion.",
    tone: "coral",
  },
];

const getToneClasses = (tone: "blue" | "coral") =>
  tone === "coral"
    ? "border-[#E0916C] bg-[#FFF4EE]"
    : "border-[#D8E1E6] bg-[#FBFCFD]";

export default function ApprovalFlowMap() {
  return (
    <div className="bg-[#F7F9FB] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="space-y-4">
          <div className="grid gap-4 md:grid-cols-2">
            {steps.slice(0, 2).map((step) => (
              <div
                key={step.title}
                className={`rounded-[1.35rem] border p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)] ${getToneClasses(step.tone)}`}
              >
                <h3 className="text-xl font-semibold tracking-tight text-[#25313A]">{step.title}</h3>
                <p className="mt-2 text-sm leading-relaxed text-[#66737B]">{step.detail}</p>
              </div>
            ))}
          </div>

          <div className="flex justify-center text-[#568FA7]">
            <div className="rounded-full border border-[#D8E1E6] bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em]">
              Decision: Approved?
            </div>
          </div>

          <div className="grid gap-4 lg:grid-cols-[1fr_120px_1fr] lg:items-stretch">
            <div className="rounded-[1.35rem] border border-[#E0916C] bg-[#FFF4EE] p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#E0916C]">No</p>
              <h3 className="mt-2 text-xl font-semibold tracking-tight text-[#25313A]">Changes Requested</h3>
              <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                Review notes send work back into production. The loop should preserve reviewer, date, and version context.
              </p>
              <div className="mt-4 rounded-2xl border border-[#F1C7B2] bg-white/70 px-4 py-3 text-sm font-medium text-[#48535A]">
                Returns to In Production
              </div>
            </div>

            <div className="flex items-center justify-center text-[#568FA7]">
              <div className="rounded-full border border-[#D8E1E6] bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em]">
                Loop
              </div>
            </div>

            <div className="space-y-4">
              <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-[#FBFCFD] p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Yes</p>
                <h3 className="mt-2 text-xl font-semibold tracking-tight text-[#25313A]">Stakeholder Review?</h3>
                <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                  Some deliverables can stop at internal approval. Others move to ministry or external review through a magic link.
                </p>
              </div>

              <div className="grid gap-4 md:grid-cols-2">
                <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">No extra review</p>
                  <h4 className="mt-2 text-lg font-semibold text-[#25313A]">Final Approved</h4>
                </div>
                <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Yes</p>
                  <h4 className="mt-2 text-lg font-semibold text-[#25313A]">Stakeholder Review</h4>
                  <p className="mt-2 text-sm text-[#66737B]">Approve or request changes.</p>
                </div>
              </div>
            </div>
          </div>

          <div className="rounded-[1.4rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
            <div className="grid gap-4 md:grid-cols-2">
              <div>
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Final State</p>
                <h3 className="mt-2 text-xl font-semibold tracking-tight text-[#25313A]">Final Approved</h3>
                <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                  The system records who approved, when they approved, and exactly which version was approved.
                </p>
              </div>
              <div className="rounded-2xl border border-[#F1C7B2] bg-[#FFF4EE] px-4 py-4">
                <p className="text-sm font-semibold text-[#25313A]">Prepared / Sent / Scheduled</p>
                <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                  Approval clears the deliverable for fulfillment. It does not mean the deliverable is complete.
                </p>
              </div>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[#25313A] p-6 text-white shadow-[0_12px_30px_rgba(37,49,58,0.12)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[#A9CBD8]">Core Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Approval is version-specific</p>
              <p className="mt-1 text-slate-300">The record must capture who approved, when, and what version they approved.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Approval clears fulfillment</p>
              <p className="mt-1 text-slate-300">Approved work can move into prepared, sent, or scheduled states.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Changes return to production</p>
              <p className="mt-1 text-slate-300">Review loops backward without losing context or history.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">External review is scoped</p>
              <p className="mt-1 text-slate-300">Stakeholder review can happen through narrow magic-link access.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
