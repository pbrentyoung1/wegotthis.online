# User Management QA Checklist  
  
Use this checklist before committing the current auth, account settings, and user-management work.  
  
Date:  
  
Tester:  
  
Branch / Commit:  
  
Notes:  
⸻  
## Auth Flow  
  
### 1. Sign In  
  
- [x] Visit ==GET /login==  
- [x] Confirm the card sign-in page renders correctly  
- [x] Confirm the seeded login works  
- [x] Confirm invalid credentials show validation errors  
- [x] Confirm logout/login roundtrip still works  
  
Notes:  
  
### 2. Registration  
  
- [x] Visit ==GET /register==  
- [x] Confirm the card sign-up page still renders correctly  
- [x] Confirm registration still works  
- [x] Confirm validation errors display correctly  
  
Notes:   
  
### 3. Forgot Password  
  
- [x] Visit ==GET /forgot-password==  
- [x] Confirm the card reset request page renders correctly  
- [ ] Confirm reset email request submission works  
- [ ] Confirm success messaging appears  
  
Notes: Didn’t receive an email. I don’t think we have set up any email authentication yet.  
  
### 4. New Password  
  
- [ ] Visit a real ==GET /reset-password/{token}== link  
- [x] Confirm the new password card page renders correctly  
- [x] Confirm password reset completes successfully  
- [x] Confirm invalid token behavior is acceptable  
  
Notes: I was able to change my password using [http://localhost:8000/settings/password](http://localhost:8000/settings/password). There needs to be feedback that the password has been changed.  
  
### 5. Two-Factor Challenge  
  
- [x] Visit ==GET /two-factor-challenge== during a real 2FA flow  
- [x] Confirm the card page renders correctly  
- [x] Confirm authenticator code entry works  
- [x] Confirm recovery code entry works  
  
Notes:  
  
### 6. Password Confirmation  
  
- [x] Visit ==GET /user/confirm-password== when prompted  
- [x] Confirm the lock-screen card page renders correctly  
- [x] Confirm correct password proceeds  
- [x] Confirm invalid password shows errors  
  
Notes:  
⸻  
## Account Settings  
  
### 7. Profile Settings Load  
  
- [x] Visit ==GET /settings/profile==  
- [x] Confirm the page renders inside the admin shell  
- [x] Confirm existing profile data loads correctly  
- [x] Confirm layout and spacing feel consistent with the current Inspinia structure  
  
Notes: Sidebar and Profile have different information about title/description. One says “platform administrator” and one says “workspace member”. I don’t know if there is an avatar in the data but there is not one in the profile.  
  
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
  
Notes: What is the workflow for verifying an email address? I’m showing “verification pending” I’m not sure a verification email was sent.  
  
### 9. Email Verification Behavior  
  
- [x] Change the email address on ==/settings/profile==  
- [ ] Confirm verification is cleared  
- [ ] Confirm resend verification still works  
- [ ] Confirm messaging is clear  
  
Notes: I’m not sure this workflow is working since the system isn’t sending emails  
  
### 10. Password Settings  
  
- [x] Visit ==GET /settings/password==  
- [x] Confirm the page renders correctly  
- [x] Confirm password update works  
- [x] Confirm current password validation still works  
  
Notes:  
  
### 11. Two-Factor Settings  
  
- [x] Visit ==GET /settings/two-factor==  
- [x] Confirm the page renders correctly  
- [x] Confirm enable flow works  
- [x] Confirm confirm/setup flow works  
- [x] Confirm disable flow works  
- [ ] Confirm recovery code regeneration works  
  
Notes:  
  
### 12. Delete Account  
  
- [ ] Confirm delete account form renders on ==/settings/profile==  
- [ ] Confirm invalid password is rejected  
- [ ] Confirm expected behavior for a valid delete action in a safe test case  
  
Notes:  
⸻  
## User Management Pages  
  
### 13. Contacts Page  
  
- [x] Visit ==GET /users/contacts==  
- [x] Confirm seeded people render as real cards  
- [x] Confirm role, status, location, and contact details display correctly  
- [ ] Confirm each card’s ==View Profile== action opens the correct user  
  
Notes: Getting odd display issues. Maybe because there isn’t avatars for people.   
![Pasted Graphic.tiff](Attachments/736BDC11-EC30-4DE4-95DD-45F25F7C897B.tiff)  
  
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
  
- [x] Visit at least two ==GET /users/profile/{user}== pages  
- [x] Confirm summary/header renders correctly  
- [x] Confirm personal info renders correctly  
- [x] Confirm bio renders correctly  
- [x] Confirm assigned roles render correctly  
- [x] Confirm permission coverage renders correctly  
- [x] Confirm joined and last-seen details look correct  
  
Notes:  
  
### 16. Roles Index  
  
- [x] Visit ==GET /users/roles==  
- [x] Confirm role cards render real data  
- [x] Confirm member chips appear correctly  
- [x] Confirm permission previews appear correctly  
- [x] Confirm ==Details== opens the correct role  
  
Notes: have rendering issues. See screenshot   
![Pasted Graphic 1.tiff](Attachments/CEB348DE-6ABF-4790-8FF3-37457F8D10AD.tiff)  
  
### 17. Role Details  
  
- [x] Visit at least one ==GET /users/roles/{role}==  
- [x] Confirm role summary renders correctly  
- [x] Confirm permission list is correct  
- [x] Confirm assigned people table loads  
- [x] Confirm search works  
- [x] Confirm status filter works  
- [x] Confirm pagination works  
  
Notes:  
  
### 18. Permissions Index  
  
- [x] Visit ==GET /users/permissions==  
- [x] Confirm permissions render with real role assignments  
- [x] Confirm people counts display  
- [x] Confirm group filter works  
- [x] Confirm search works  
- [x] Confirm pagination works  
  
Notes:  
⸻  
## Navigation And Shell  
  
### 19. Sidebar Navigation  
  
- [x] Confirm the ==Users== section appears in the sidebar  
- [x] Confirm ==Contacts== link works  
- [x] Confirm ==Roles== link works  
- [x] Confirm ==Permissions== link works  
- [x] Confirm active state is correct on each page  
  
Notes:  
  
### 20. User Menus  
  
- [x] Confirm topbar ==Profile== opens the signed-in user profile  
- [x] Confirm sidebar ==Profile== opens the signed-in user profile  
- [x] Confirm topbar ==Account Settings== opens ==/settings/profile==  
- [x] Confirm sidebar ==Account Settings== opens ==/settings/profile==  
- [x] Confirm topbar logout still works  
- [x] Confirm sidebar logout still works  
  
Notes:  
⸻  
## Responsive Review  
  
### 21. Mobile Pass  
  
- [x] Check ==/settings/profile==  
- [x] Check ==/users/contacts==  
- [x] Check ==/users/profile/{user}==  
- [x] Check ==/users/roles/{role}==  
- [x] Check ==/users/permissions==  
- [x] Confirm no major overflow issues  
- [x] Confirm tables/cards remain usable  
- [x] Confirm filters remain usable  
  
Notes:  
⸻  
## Content And Seed Review  
  
### 22. Seed Data Quality  
  
- [x] Confirm seeded statuses feel plausible  
- [x] Confirm seeded departments feel plausible  
- [x] Confirm seeded roles feel plausible  
- [x] Confirm permission groupings feel plausible  
- [x] Confirm wording does not feel like leftover generic admin-app copy  
  
Notes: Need Avatars  
⸻  
## Regression Pass  
  
### 23. Regression Check  
  
- [ ] Recheck ==/register==  
- [ ] Recheck ==/forgot-password==  
- [ ] Recheck ==/reset-password/{token}==  
- [ ] Recheck ==/two-factor-challenge==  
- [ ] Recheck ==/settings/password==  
- [ ] Recheck ==/settings/two-factor==  
  
Notes:  
⸻  
## Final Signoff  
  
- [ ] Ready to commit  
- [x] Follow-up fixes identified  
- [ ] Blocking issues identified  
  
Summary:  
