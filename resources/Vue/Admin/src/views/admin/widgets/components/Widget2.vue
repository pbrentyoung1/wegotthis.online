<template>
  <div class="card">
    <div class="card-body">
      <a href="#" class="float-end -mt-1.25 text-xl text-default-400">
        <Icon icon="external-link" />
      </a>

      <h5 title="Number of Tasks">My Tasks</h5>

      <div class="my-5 flex items-center gap-2.5">
        <div>
          <span class="flex size-9 items-center justify-center rounded-full bg-light">
            <Icon icon="checklist" class="size-5.5" />
          </span>
        </div>

        <h3 class="text-xl">
          <CountUp :endVal="124" />
        </h3>

        <span class="badge ms-auto bg-primary/15 text-xs font-medium text-primary"> +3 New </span>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="text-primary">
            <Icon icon="point-filled" />
          </span>
          <span class="text-muted text-nowrap">Total Tasks</span>
        </div>
        <span><b>12,450</b></span>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <a href="#!" class="float-end -mt-1.25 text-xl text-default-400">
        <Icon icon="external-link" />
      </a>

      <h5 title="Number of Messages">Messages</h5>

      <div class="my-5 flex items-center gap-2.5">
        <div>
          <span class="flex size-9 items-center justify-center rounded-full bg-purple text-white">
            <Icon icon="message-circle" class="size-5.5" />
          </span>
        </div>

        <h3 class="text-xl">
          <CountUp :endVal="69.5" :options="{ decimalPlaces: 1, suffix: 'k' }" />
        </h3>

        <span class="badge ms-auto bg-secondary/15 text-xs font-medium text-secondary"> +5 New </span>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="text-secondary">
            <Icon icon="point-filled" />
          </span>
          <span class="text-muted text-nowrap">Total Messages</span>
        </div>
        <span><b>32.1M</b></span>
      </div>
    </div>
  </div>

  <div class="card border-0 bg-primary text-white">
    <div class="card-body">
      <a href="#!" class="text-white-50 mt-n1 float-end text-xl">
        <Icon icon="external-link" />
      </a>

      <h5 title="Pending Approvals">Approvals</h5>

      <div class="my-5 flex items-center gap-2.5">
        <div>
          <span class="flex size-9 items-center justify-center rounded-full bg-white/20">
            <Icon icon="file-check" class="size-5.5" />
          </span>
        </div>

        <h3 class="text-xl">
          <CountUp :endVal="32" />
        </h3>
      </div>

      <p>
        <span class="text-opacity-75 text-nowrap text-white"> Total Approvals: </span>
        <span class="float-end">
          <b>
            <CountUp :endVal="1479" />
          </b>
        </span>
      </p>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <a href="#!" class="float-end -mt-1.25 text-xl text-default-400">
        <Icon icon="external-link" />
      </a>

      <h5 title="Total Clients">Clients</h5>

      <div class="my-5 flex items-center gap-2.5">
        <div>
          <span class="flex size-9 items-center justify-center rounded-full bg-info text-white">
            <Icon icon="users" class="size-5.5" />
          </span>
        </div>

        <h3 class="text-xl">
          <CountUp :endVal="184" />
        </h3>

        <span class="badge ms-auto bg-secondary/15 text-xs font-medium text-secondary"> +4 New </span>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="text-secondary">
            <Icon icon="point-filled" />
          </span>
          <span class="text-muted text-nowrap">Total Clients</span>
        </div>
        <span><b>9,835</b></span>
      </div>
    </div>
  </div>

  <div class="card border-0 bg-danger/10">
    <div class="card-body">
      <a href="#" class="float-end -mt-1.25 text-xl text-default-400">
        <Icon icon="external-link" />
      </a>

      <h5 title="Revenue Generated">Revenue</h5>

      <div class="my-5 flex items-center gap-2.5">
        <div>
          <span class="flex size-9 items-center justify-center rounded-full bg-danger/90 text-white">
            <Icon icon="credit-card" class="size-5.5" />
          </span>
        </div>

        <h3 class="text-xl">
          <CountUp :endVal="125.5" :options="{ decimalPlaces: 1, suffix: 'k', prefix: '$' }" />
        </h3>

        <span class="badge ms-auto bg-danger/15 text-xs font-medium text-danger"> +1.5% </span>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="text-primary">
            <Icon icon="point-filled" />
          </span>
          <span class="text-muted text-nowrap">Total Revenue</span>
        </div>
        <span><b>$12.5M</b></span>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import CountUp from 'vue-countup-v3'
import Icon from '~/components/wrappers/Icon.vue'
</script>
