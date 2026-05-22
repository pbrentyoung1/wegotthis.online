const activityExamples = [
  "Status changed",
  "Comment added",
  "File uploaded",
  "Approval requested",
  "Task completed",
  "Deliverable assigned",
];

const auditExamples = [
  "Magic link generated",
  "Magic link revoked",
  "Permission changed",
  "User invited",
  "Role changed",
  "Sensitive asset downloaded",
];

export default function ActivityAuditRelationshipDiagram() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="space-y-4">
          <div className="rounded-[1.4rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
            <div className="flex flex-wrap items-center gap-3">
              <div className="rounded-full border border-[var(--border-soft)] bg-[var(--accent-blue-soft)] px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em] text-[var(--accent-blue)]">
                Action
              </div>
              <div className="rounded-full border border-[var(--border-soft)] bg-[var(--accent-blue-soft)] px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em] text-[var(--accent-blue)]">
                User or System
              </div>
            </div>
          </div>

          <div className="grid gap-4 lg:grid-cols-2">
            <div className="rounded-[1.4rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Product Activity Stream</p>
              <h3 className="mt-2 text-2xl font-semibold tracking-tight text-[var(--text-strong)]">Explains work</h3>
              <div className="mt-4 space-y-3">
                {activityExamples.map((item) => (
                  <div key={item} className="rounded-2xl border border-[var(--border-soft)] bg-[var(--surface-soft)] px-4 py-3 text-sm text-[var(--text-body)]">
                    {item}
                  </div>
                ))}
              </div>
              <div className="mt-4 rounded-2xl border border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] px-4 py-3 text-sm leading-relaxed text-[var(--text-body)]">
                Selected activity or system events may also generate notifications.
              </div>
            </div>

            <div className="rounded-[1.4rem] border border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-coral)]">Security Audit Log</p>
              <h3 className="mt-2 text-2xl font-semibold tracking-tight text-[var(--text-strong)]">Proves accountability</h3>
              <div className="mt-4 space-y-3">
                {auditExamples.map((item) => (
                  <div key={item} className="rounded-2xl border border-[var(--accent-coral-border)] bg-white/80 px-4 py-3 text-sm text-[var(--text-body)]">
                    {item}
                  </div>
                ))}
              </div>
              <div className="mt-4 rounded-2xl border border-[var(--border-soft)] bg-white/80 px-4 py-3 text-sm leading-relaxed text-[var(--text-body)]">
                Audit records should be immutable and more restricted than the ordinary activity stream.
              </div>
            </div>
          </div>

          <div className="grid gap-4 md:grid-cols-3">
            <div className="rounded-[1.3rem] border border-[var(--border-soft)] bg-white p-4 text-sm leading-relaxed text-[var(--text-body)] shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              Not every activity event is an audit log.
            </div>
            <div className="rounded-[1.3rem] border border-[var(--border-soft)] bg-white p-4 text-sm leading-relaxed text-[var(--text-body)] shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              Not every audit log belongs in the visible project feed.
            </div>
            <div className="rounded-[1.3rem] border border-[var(--border-soft)] bg-white p-4 text-sm leading-relaxed text-[var(--text-body)] shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              Notifications are downstream outputs, not the system of record.
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Core Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Activity explains work</p>
              <p className="mt-1 text-slate-300">It is the user-facing narrative of what happened in the project.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Audit proves accountability</p>
              <p className="mt-1 text-slate-300">Security-sensitive actions need immutable traceability.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Notifications are not the source of truth</p>
              <p className="mt-1 text-slate-300">They are delivery outcomes, not the authoritative work record.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Security events must be immutable</p>
              <p className="mt-1 text-slate-300">Once recorded, sensitive access and permission actions should not be casually rewritten.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
