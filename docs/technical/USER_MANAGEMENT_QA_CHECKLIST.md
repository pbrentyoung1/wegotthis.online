# User Management QA Checklist

Use this checklist before committing the current auth, account settings, and user-management work.

Date: 2026-05-27

Tester:

Branch / Commit:

Notes:

---

## Auth Flow

### 1. Sign In

- [x] Visit `GET /login`
- [x] Confirm the card sign-in page renders correctly
- [x] Confirm the seeded login works
- [x] Confirm invalid credentials show validation errors
- [x] Confirm logout/login roundtrip still works

Notes:

### 2. Registration

- [x] Visit `GET /register`
- [x] Confirm the card sign-up page still renders correctly
- [x] Confirm registration still works
- [x] Confirm validation errors display correctly

Notes:

### 3. Forgot Password

- [x] Visit `GET /forgot-password`
- [x] Confirm the card reset request page renders correctly
- [ ] Confirm reset email request submission works
- [ ] Confirm success messaging appears

Notes: Did not receive an email. This is expected until email authentication/delivery is configured.

### 4. New Password

- [ ] Visit a real `GET /reset-password/{token}` link
- [x] Confirm the new password card page renders correctly
- [x] Confirm password reset completes successfully
- [x] Confirm invalid token behavior is acceptable

Notes: Password was changed successfully from `/settings/password`. The page needs clear feedback that the password has been changed.

### 5. Two-Factor Challenge

- [x] Visit `GET /two-factor-challenge` during a real 2FA flow
- [x] Confirm the card page renders correctly
- [x] Confirm authenticator code entry works
- [x] Confirm recovery code entry works

Notes:

### 6. Password Confirmation

- [x] Visit `GET /user/confirm-password` when prompted
- [x] Confirm the lock-screen card page renders correctly
- [x] Confirm correct password proceeds
- [x] Confirm invalid password shows errors

Notes:

---

## Account Settings

### 7. Profile Settings Load

- [x] Visit `GET /settings/profile`
- [x] Confirm the page renders inside the admin shell
- [x] Confirm existing profile data loads correctly
- [x] Confirm layout and spacing feel consistent with the current Inspinia structure

Notes: Sidebar and profile show different title/description information. One says "Platform Administrator" and one says "Workspace Member". Profile does not show an avatar image.

### 8. Profile Settings Save

- [x] Save updates for full name
- [x] Save updates for job title
- [x] Save updates for department
- [x] Save updates for phone
- [x] Save updates for city, state, and country
- [x] Save updates for timezone
- [x] Save updates for website
- [x] Save updates for bio
- [x] Save updates for social links
- [ ] Confirm success messaging appears
- [x] Refresh the page and confirm saved values persist

Notes: Email verification workflow is unclear. The page shows "Verification pending"; not sure a verification email was sent.

### 9. Email Verification Behavior

- [x] Change the email address on `/settings/profile`
- [ ] Confirm verification is cleared
- [ ] Confirm resend verification still works
- [ ] Confirm messaging is clear

Notes: This workflow cannot be fully verified until the system is sending email.

### 10. Password Settings

- [x] Visit `GET /settings/password`
- [x] Confirm the page renders correctly
- [x] Confirm password update works
- [x] Confirm current password validation still works

Notes:

### 11. Two-Factor Settings

- [x] Visit `GET /settings/two-factor`
- [x] Confirm the page renders correctly
- [x] Confirm enable flow works
- [x] Confirm confirm/setup flow works
- [x] Confirm disable flow works
- [ ] Confirm recovery code regeneration works

Notes:

### 12. Delete Account

- [ ] Confirm delete account form renders on `/settings/profile`
- [ ] Confirm invalid password is rejected
- [ ] Confirm expected behavior for a valid delete action in a safe test case

Notes:

---

## User Management Pages

### 13. Contacts Page

- [x] Visit `GET /users/contacts`
- [x] Confirm seeded people render as real cards
- [x] Confirm role, status, location, and contact details display correctly
- [ ] Confirm each card's `View Profile` action opens the correct user

Notes: Getting odd display issues, possibly because there are not avatars for people.

### 14. Contacts Filters

- [x] Search by name
- [x] Search by email
- [x] Filter by role
- [x] Filter by department
- [x] Filter by status
- [x] Reset filters
- [x] Confirm pagination works

Notes:

### 15. User Profile Page

- [x] Visit at least two `GET /users/profile/{user}` pages
- [x] Confirm summary/header renders correctly
- [x] Confirm personal info renders correctly
- [x] Confirm bio renders correctly
- [x] Confirm assigned roles render correctly
- [x] Confirm permission coverage renders correctly
- [x] Confirm joined and last-seen details look correct

Notes:

### 16. Roles Index

- [x] Visit `GET /users/roles`
- [x] Confirm role cards render real data
- [x] Confirm member chips appear correctly
- [x] Confirm permission previews appear correctly
- [x] Confirm `Details` opens the correct role

Notes: Rendering issues observed in the role cards.

### 17. Role Details

- [x] Visit at least one `GET /users/roles/{role}`
- [x] Confirm role summary renders correctly
- [x] Confirm permission list is correct
- [x] Confirm assigned people table loads
- [x] Confirm search works
- [x] Confirm status filter works
- [x] Confirm pagination works

Notes:

### 18. Permissions Index

- [x] Visit `GET /users/permissions`
- [x] Confirm permissions render with real role assignments
- [x] Confirm people counts display
- [x] Confirm group filter works
- [x] Confirm search works
- [x] Confirm pagination works

Notes:

---

## Navigation And Shell

### 19. Sidebar Navigation

- [x] Confirm the `Users` section appears in the sidebar
- [x] Confirm `Contacts` link works
- [x] Confirm `Roles` link works
- [x] Confirm `Permissions` link works
- [x] Confirm active state is correct on each page

Notes:

### 20. User Menus

- [x] Confirm topbar `Profile` opens the signed-in user profile
- [x] Confirm sidebar `Profile` opens the signed-in user profile
- [x] Confirm topbar `Account Settings` opens `/settings/profile`
- [x] Confirm sidebar `Account Settings` opens `/settings/profile`
- [x] Confirm topbar logout still works
- [x] Confirm sidebar logout still works

Notes:

---

## Responsive Review

### 21. Mobile Pass

- [x] Check `/settings/profile`
- [x] Check `/users/contacts`
- [x] Check `/users/profile/{user}`
- [x] Check `/users/roles/{role}`
- [x] Check `/users/permissions`
- [x] Confirm no major overflow issues
- [x] Confirm tables/cards remain usable
- [x] Confirm filters remain usable

Notes:

---

## Content And Seed Review

### 22. Seed Data Quality

- [x] Confirm seeded statuses feel plausible
- [x] Confirm seeded departments feel plausible
- [x] Confirm seeded roles feel plausible
- [x] Confirm permission groupings feel plausible
- [x] Confirm wording does not feel like leftover generic admin-app copy

Notes: Need avatars.

---

## Regression Pass

### 23. Regression Check

- [ ] Recheck `/register`
- [ ] Recheck `/forgot-password`
- [ ] Recheck `/reset-password/{token}`
- [ ] Recheck `/two-factor-challenge`
- [ ] Recheck `/settings/password`
- [ ] Recheck `/settings/two-factor`

Notes:

---

## Final Signoff

- [ ] Ready to commit
- [x] Follow-up fixes identified
- [ ] Blocking issues identified

Summary: Local fixes applied for password-update feedback, profile title consistency, avatar/stat icon rendering, seeded headshot avatars, and local Mailpit email capture.

Post-fix verification:

- Added `avatar_path` to user profiles and seeded public headshots from `resources/headshots` into `public/images/headshots`.
- `php artisan migrate --seed` passed and applied `2026_05_27_141500_add_avatar_path_to_user_profiles_table`.
- `composer test` passed: 45 tests, 199 assertions.
- `npm run build` passed. Existing large `app` chunk warning remains.
- Local Laravel server restarted at `http://127.0.0.1:8000`; `/login` returned `200 OK`.
- Browser requests for `/images/headshots/headshot-01.jpeg` through `/images/headshots/headshot-08.jpeg` were logged by the local Laravel server.
- Vite dev server remains available at `http://127.0.0.1:5173`.
- Mailpit installed and started locally. SMTP is listening on `127.0.0.1:1025`; inbox UI is at `http://127.0.0.1:8025`.
- Local `.env` mail settings changed to `MAIL_MAILER=smtp`, `MAIL_HOST=127.0.0.1`, `MAIL_PORT=1025`, and `MAIL_FROM_ADDRESS=notifications@forworship.test`.
- Password reset smoke test returned `passwords.sent`; Mailpit captured one email with subject `Reset your password` to `test@example.com`.
- Contacts, roles, role details, permissions, and user profile pages were revised toward the local Inspinia reference pages in `resources/Laravel/inspinia/resources/views/apps/users/` and `resources/Laravel/inspinia/resources/views/pages/profile.blade.php`.
- Contacts now use the Inspinia contact-card structure with headshots, status marker, icon detail rows, compact summary counters, and filter toolbar.
- Roles now use the Inspinia role-card structure with a large role icon, checklist permissions, user count, avatar stack, and details action.
- Role details now use the Inspinia side-summary plus member table structure.
- Permissions now use the Inspinia searchable table-card structure.
- User profile now uses the Inspinia profile cover/header structure with profile summary, personal info, roles, and permissions below.
- Post-layout verification passed: `composer test` passed with 45 tests and 199 assertions; `npm run build` passed. Existing large `app` chunk warning remains.
- Account settings were revised toward the local Inspinia account settings/profile references.
- Added a shared settings hero using the existing settings background artwork, revised the settings sidebar card to use icon chips and the signed-in profile avatar, and aligned `/settings/profile`, `/settings/password`, and `/settings/two-factor` around the same lifted card layout.
- Profile settings now group personal, location, and social fields with compact section headers, keep the delete-account action in a separate risk card, and preserve the existing save/delete behavior.
- Password settings now show the same account header/sidebar treatment and retain success/error feedback for password updates.
- Two-factor settings now use the same account header/sidebar treatment, clearer status badge styling, and preserved enable/confirm/recovery/disable flows.
- Other currently wired demo/auth/error/layout pages were left alone because they already map to their existing Inspinia page families; this pass focused on the account settings pages that were still visually behind the newly revised user-management pages.
- Account-settings verification passed: `composer test` passed with 45 tests and 199 assertions; `npm run build` passed. Existing large `app` chunk warning remains.
- Account settings banner issue identified from screenshot: the starterkit was using the small gray `settings-bg.png`, which made the cover look like a placeholder.
- Copied the local Inspinia `profile-bg.jpg` asset into the starterkit public images and updated the settings hero to use it with a darker gradient overlay, shorter desktop height, and smaller mobile height.
- Banner fix verification passed: `composer test` passed with 45 tests and 199 assertions; `npm run build` passed. Existing large `app` chunk warning remains.
- Updated account settings layout from the two-column account/sidebar composition to match the Inspinia reference screenshot: a full banner followed by one centered white form card overlapping the cover.
- Applied the same centered-card shell to `/settings/profile`, `/settings/password`, and `/settings/two-factor` while keeping the existing form actions, success messages, delete-account form, and two-factor flows intact.
- Centered-card verification passed: `composer test` passed with 45 tests and 199 assertions; `npm run build` passed. Existing large `app` chunk warning remains.
- Reworked `/users/profile/{user}` to emulate the Inspinia profile page more directly instead of continuing a custom profile design.
- Profile now uses the Inspinia cover/profile header pattern, personal information sidebar, role badge block, recent messages block, four compact metric cards, about section, task table, and permission coverage section.
- Replaced the Inspinia `Clients` metric with `Projects`, removed `Follow`, kept `Message`, and kept current profile/role/permission data wired while using placeholder task and message rows shaped for the future workflows.
- Product intent captured for future functionality: `Recent Messages` should become a mixed feed of system-generated notifications and person/team messages; `My Tasks` should eventually support table/list, Kanban, and calendar views without requiring another profile-page redesign.
- Profile-page verification passed: `composer test` passed with 45 tests and 199 assertions; `npm run build` passed. Existing large `app` chunk warning remains.
