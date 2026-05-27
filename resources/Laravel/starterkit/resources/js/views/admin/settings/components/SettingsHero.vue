<template>
  <div class="settings-hero position-relative overflow-hidden rounded mb-4">
    <div class="settings-hero-overlay position-absolute top-0 start-0 end-0 bottom-0"></div>
    <div class="position-relative d-flex flex-column align-items-center justify-content-center gap-2 h-100 px-4 text-center">
      <h3 class="text-white fst-italic mb-0">"Keep your account ready for the work your team is carrying."</h3>
      <span class="badge bg-primary-subtle text-primary">ForWorship Creative</span>
    </div>
  </div>
</template>

<style scoped>
.settings-hero {
  min-height: 220px;
  background-image: url('/images/profile-bg.jpg');
  background-position: center;
  background-size: cover;
}

.settings-hero-overlay {
  background: linear-gradient(0deg, rgba(49, 58, 70, 0.92), rgba(49, 58, 70, 0.58));
}

.settings-hero h3 {
  font-size: 1.35rem;
}

@media (max-width: 767.98px) {
  .settings-hero {
    min-height: 170px;
  }

  .settings-hero h3 {
    font-size: 1rem;
  }
}
</style>
