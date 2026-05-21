const scopeCards = [
  "Tenant / Church",
  "Project",
  "Deliverable",
  "Asset / Version",
  "Permitted Actions",
  "Expiration Date",
  "Optional Identity Capture",
  "Audit Trail",
];

const actions = ["View only", "Comment", "Approve", "Request changes", "Upload file"];

export default function MagicLinkScopeMap() {
  return (
    <div className="bg-[#F7F9FB] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="space-y-4">
          <div className="grid gap-4 md:grid-cols-3">
            <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)] md:col-span-1">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">1. Generate Link</p>
              <h3 className="mt-2 text-xl font-semibold tracking-tight text-[#25313A]">Internal User</h3>
              <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                An internal user creates a review link for a specific external person and specific work context.
              </p>
            </div>
            <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-[#FBFCFD] p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)] md:col-span-2">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">2. Define Scope</p>
              <div className="mt-3 grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                {scopeCards.map((item) => (
                  <div key={item} className="rounded-2xl border border-[#D8E1E6] bg-white px-4 py-3 text-sm font-medium text-[#25313A]">
                    {item}
                  </div>
                ))}
              </div>
            </div>
          </div>

          <div className="rounded-[1.4rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
            <div className="grid gap-4 lg:grid-cols-[1fr_130px_1fr] lg:items-center">
              <div>
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">3. Reviewer Opens Link</p>
                <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                  The external reviewer opens the link on mobile or desktop without a full account.
                </p>
              </div>

              <div className="flex justify-center">
                <div className="rounded-full border border-[#D8E1E6] bg-[#F7FAFB] px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em] text-[#568FA7]">
                  Validate
                </div>
              </div>

              <div className="rounded-[1.25rem] border border-dashed border-[#A9CBD8] bg-[#F7FAFB] px-5 py-4">
                <p className="text-sm font-semibold text-[#25313A]">Token + Expiration + Scope + Permission</p>
                <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                  Access only proceeds when the token is valid, unexpired, unrevoked, and tied to an explicit action set.
                </p>
              </div>
            </div>
          </div>

          <div className="grid gap-4 lg:grid-cols-[1fr_1fr]">
            <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">4. Explicit Actions</p>
              <div className="mt-3 flex flex-wrap gap-3">
                {actions.map((action, index) => (
                  <div
                    key={action}
                    className={`rounded-full border px-4 py-2 text-sm font-medium ${
                      index < 4 ? "border-[#D8E1E6] bg-[#FBFCFD] text-[#25313A]" : "border-[#E0916C] bg-[#FFF4EE] text-[#25313A]"
                    }`}
                  >
                    {action}
                  </div>
                ))}
              </div>
              <p className="mt-4 text-sm leading-relaxed text-[#66737B]">
                Permissions are explicit. They should not be inherited casually from broader internal project access.
              </p>
            </div>

            <div className="rounded-[1.35rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">5. Action Logged</p>
              <div className="mt-3 rounded-2xl border border-[#F1C7B2] bg-[#FFF4EE] px-4 py-4">
                <p className="text-sm font-semibold text-[#25313A]">Every external action is audited</p>
                <p className="mt-2 text-sm leading-relaxed text-[#66737B]">
                  Opened link, approved deliverable, requested changes, or uploaded file actions all produce durable records.
                </p>
              </div>
              <p className="mt-4 text-sm leading-relaxed text-[#66737B]">
                Links expire or are revoked when their job is finished, when access changes, or when risk needs to be reduced.
              </p>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[#25313A] p-6 text-white shadow-[0_12px_30px_rgba(37,49,58,0.12)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[#A9CBD8]">Scope Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Link access is narrow</p>
              <p className="mt-1 text-slate-300">Magic links should expose only the exact context an external person needs.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Every action is audited</p>
              <p className="mt-1 text-slate-300">The system should capture who used the link and what they did.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Expiration is required</p>
              <p className="mt-1 text-slate-300">Time-bound access is part of the security model, not a nice-to-have.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Revocation must be supported</p>
              <p className="mt-1 text-slate-300">Links should be withdrawable whenever project, security, or people conditions change.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
