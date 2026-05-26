<template>
  <div class="card lg:sticky lg:top-22">
    <div class="card-body">
      <div class="bg-light/15 border-light flex items-center justify-between gap-2 rounded border p-2.5">
        <div class="md:flex items-center gap-base">
          <div class="size-12">
            <img src="/images/sellers/1.png" alt="avatar-store" class="img-fluid rounded-full" />
          </div>

          <div>
            <h4 class="font-bold whitespace-nowrap mb-1.25">MacHub Retailers</h4>
            <p class="text-default-400 text-sm">Since 2017</p>
          </div>
        </div>

        <div class="relative ms-auto">
          <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="hs-dropdown-toggle btn btn-sm btn-icon bg-light text-dark" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <Icon icon="dots" class="text-2xl" />
            </button>

            <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
              <div class="space-y-0.5">
                <a class="dropdown-item" href="#">Edit profile</a>
                <a class="dropdown-item text-danger" href="#">Report</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <div class="mb-2.5 flex items-center gap-2.5">
          <div class="btn btn-icon bg-light size-8">
            <Icon icon="user" class="text-default-400 text-lg" />
          </div>
          <p class="text-sm">
            Owner:
            <span class="font-semibold">Sophie Martinez</span>
          </p>
        </div>

        <div class="mb-2.5 flex items-center gap-2.5">
          <div class="btn btn-icon bg-light size-8">
            <Icon icon="briefcase" class="text-default-400 text-lg" />
          </div>
          <p class="text-sm">
            Business Type:
            <span class="font-semibold">Fashion Retail</span>
          </p>
        </div>

        <div class="mb-2.5 flex items-center gap-2.5">
          <div class="btn btn-icon bg-light size-8">
            <Icon icon="calendar" class="text-default-400 text-lg" />
          </div>
          <p class="text-sm">
            Founded:
            <span class="font-semibold">2015</span>
          </p>
        </div>

        <div class="mb-2.5 flex items-center gap-2.5">
          <div class="btn btn-icon bg-light size-8">
            <Icon icon="map-pin" class="text-default-400 text-lg" />
          </div>
          <p class="text-sm">
            Location:
            <span class="font-semibold">Los Angeles, USA</span>
          </p>
        </div>

        <div class="mb-2.5 flex items-center gap-2.5">
          <div class="btn btn-icon bg-light size-8">
            <Icon icon="mail" class="text-default-400 text-lg" />
          </div>
          <p class="text-sm">
            Support:
            <a href="mailto:help&#64;stylehub.com" class="text-primary font-semibold">help&#64;stylehub.com</a>
          </p>
        </div>

        <div class="mb-2.5 flex items-center gap-2.5">
          <div class="btn btn-icon bg-light size-8">
            <Icon icon="world" class="text-default-400 text-lg" />
          </div>
          <p class="text-sm">
            Website:
            <a href="https://www.stylehub.com" class="text-primary font-semibold">www.stylehub.com</a>
          </p>
        </div>
      </div>
    </div>

    <div class="card-body border-default-300 border-t border-dashed">
      <h5 class="mb-5">Contact Seller</h5>
      <textarea class="form-textarea mb-base" rows="4" id="exampleFormControlTextarea1" placeholder="Enter your messages..."></textarea>

      <div class="text-end">
        <button type="submit" class="btn bg-primary text-white hover:bg-primary-hover">Send Messages</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
</script>

<style lang="scss" scoped></style>
