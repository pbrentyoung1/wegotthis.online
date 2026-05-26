<template>
  <BRow class="row-cols-xxl-5 row-cols-md-3 row-cols-1 align-items-center">
    <BCol>
      <BCard no-body>
        <BCardBody>
          <Link href="#!" class="text-muted float-end mt-n1 fs-xl">
            <IconifyIcon icon="tabler:external-link" />
          </Link>
          <h5 title="Number of Tasks">My Tasks</h5>
          <div class="d-flex align-items-center gap-2 my-3">
            <div class="avatar-md flex-shrink-0">
              <span class="avatar-title text-bg-light rounded-circle fs-22">
                <IconifyIcon icon="tabler:checklist" />
              </span>
            </div>
            <h3 class="mb-0">
              <CountUp :end-val="124" />
            </h3>
            <span class="badge badge-soft-primary fw-medium ms-2 fs-xs ms-auto">+3 New</span>
          </div>
          <p class="mb-0">
            <span class="text-primary">
              <IconifyIcon icon="tabler:point-filled" />
            </span>
            <span class="text-nowrap text-muted">Total Tasks</span>
            <span class="float-end"><b>12,450</b></span>
          </p>
        </BCardBody>
      </BCard>
    </BCol>

    <BCol>
      <BCard no-body>
        <BCardBody>
          <Link href="#!" class="text-muted float-end mt-n1 fs-xl">
            <IconifyIcon icon="tabler:external-link" />
          </Link>
          <h5 title="Number of Messages">Messages</h5>
          <div class="d-flex align-items-center gap-2 my-3">
            <div class="avatar-md flex-shrink-0">
              <span class="avatar-title text-bg-purple rounded-circle fs-22">
                <IconifyIcon icon="tabler:message-circle" />
              </span>
            </div>
            <h3 class="mb-0">
              <CountUp :end-val="69.5" :options="{ suffix: 'k', decimalPlaces: 2 }" />
            </h3>
            <span class="badge badge-soft-secondary fw-medium ms-2 fs-xs ms-auto">+5 New</span>
          </div>
          <p class="mb-0">
            <span class="text-secondary">
              <IconifyIcon icon="tabler:point-filled" />
            </span>
            <span class="text-nowrap text-muted">Total Messages</span>
            <span class="float-end"><b>32.1M</b></span>
          </p>
        </BCardBody>
      </BCard>
    </BCol>

    <BCol>
      <div class="card text-bg-primary">
        <BCardBody>
          <Link href="#!" class="text-white-50 float-end mt-n1 fs-xl">
            <IconifyIcon icon="tabler:external-link" />
          </Link>
          <h5 title="Pending Approvals">Approvals</h5>
          <div class="d-flex align-items-center gap-2 my-3">
            <div class="avatar-md flex-shrink-0">
              <span class="avatar-title bg-white bg-opacity-20 rounded-circle fs-22">
                <IconifyIcon icon="tabler:file-check" />
              </span>
            </div>
            <h3 class="mb-0">
              <CountUp :end-val="32" />
            </h3>
          </div>
          <p class="mb-0">
            <span class="text-nowrap text-white text-opacity-75">Total Approvals:</span>
            <span class="float-end"
              ><b><span>1479</span></b></span
            >
          </p>
        </BCardBody>
      </div>
    </BCol>

    <BCol>
      <BCard no-body>
        <BCardBody>
          <Link href="#!" class="text-muted float-end mt-n1 fs-xl">
            <IconifyIcon icon="tabler:external-link" />
          </Link>
          <h5 title="Total Clients">Clients</h5>
          <div class="d-flex align-items-center gap-2 my-3">
            <div class="avatar-md flex-shrink-0">
              <span class="avatar-title text-bg-info rounded-circle fs-22">
                <IconifyIcon icon="tabler:users" />
              </span>
            </div>
            <h3 class="mb-0">
              <CountUp :end-val="184" />
            </h3>
            <span class="badge badge-soft-secondary fw-medium ms-2 fs-xs ms-auto">+4 New</span>
          </div>
          <p class="mb-0">
            <span class="text-secondary">
              <IconifyIcon icon="tabler:point-filled" />
            </span>
            <span class="text-nowrap text-muted">Total Clients</span>
            <span class="float-end"><b>9,835</b></span>
          </p>
        </BCardBody>
      </BCard>
    </BCol>

    <div class="col-lg col-md-auto">
      <div class="card bg-danger bg-opacity-10">
        <BCardBody>
          <Link href="#!" class="text-muted float-end mt-n1 fs-xl">
            <IconifyIcon icon="tabler:external-link" />
          </Link>
          <h5 title="Revenue Generated">Revenue</h5>
          <div class="d-flex align-items-center gap-2 my-3">
            <div class="avatar-md flex-shrink-0">
              <span class="avatar-title text-bg-danger bg-opacity-90 rounded-circle fs-22">
                <IconifyIcon icon="tabler:credit-card" />
              </span>
            </div>
            <h3 class="mb-0">
              <CountUp :end-val="125.5" :options="{ prefix: '$', suffix: 'k', decimalPlaces: 2 }" />
            </h3>
            <span class="badge badge-soft-danger fw-medium ms-2 fs-xs ms-auto">+1.5%</span>
          </div>
          <p class="mb-0">
            <span class="text-primary">
              <IconifyIcon icon="tabler:point-filled" />
            </span>
            <span class="text-nowrap text-muted">Total Revenue</span>
            <span class="float-end"><b>$12.5M</b></span>
          </p>
        </BCardBody>
      </div>
    </div>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard, BCardBody } from 'bootstrap-vue-next'
import CountUp from 'vue-countup-v3'
</script>
