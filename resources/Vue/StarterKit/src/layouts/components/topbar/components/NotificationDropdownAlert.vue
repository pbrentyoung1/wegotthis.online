<template>
  <div id="notification-dropdown-alert" class="topbar-item hs-dropdown relative inline-flex [--auto-close:inside] [--placement:bottom-right]">
    <button class="topbar-link hs-dropdown-toggle relative flex items-center" type="button" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
      <Icon icon="bell" class="topbar-link-icon" />
      <span class="badge bg-warning absolute -end-px -top-[13px] size-4 rounded text-white">12</span>
    </button>

    <div class="hs-dropdown-menu min-w-80 p-0 space-y-0" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
      <div class="border-default-300 border-b px-3 py-2">
        <div class="flex items-center justify-between">
          <h6 class="text-base font-semibold">Notifications</h6>
          <a href="#" class="badge badge-label bg-light text-dark">12 Alerts</a>
        </div>
      </div>

      <simplebar style="max-height: 300px" data-simplebar>
        <div class="dropdown-item hs-removing:hidden items-start gap-3 px-4.5 py-3 text-wrap" :id="`notification-${idx}`" v-for="(notification, idx) in notificationData" :key="idx">
          <span class="shrink-0">
            <span :class="['flex size-9 items-center justify-center rounded', notification.iconClassName]">
              <Icon :icon="notification.icon" class="text-lg fill-danger" />
            </span>
          </span>
          <span class="text-default-400 grow">
            <span class="font-medium text-body-color">{{ notification.message }}</span>
            <br />
            <span class="text-xs">{{ notification.time }}</span>
          </span>
          <button type="button" class="text-default-400 btn btn-link shrink-0 p-0" :data-hs-remove-element="`#notification-${idx}`">
            <Icon icon="square-rounded-x" class="text-xl" />
          </button>
        </div>
      </simplebar>

      <a href="#" class="dropdown-item text-reset border-light justify-center border-t py-3 font-bold underline underline-offset-2">View All Alerts</a>
    </div>
  </div>
</template>

<script setup lang="ts">
import simplebar from 'simplebar-vue'
import Icon from '~/components/wrappers/Icon.vue'

type NotificationType = {
  icon: string
  iconClassName: string
  message: string
  time: string
}

const notificationData: NotificationType[] = [
  {
    icon: 'server-bolt',
    iconClassName: 'bg-danger/15 text-danger',
    message: 'Critical alert: Server crash detected',
    time: '30 minutes ago',
  },
  {
    icon: 'alert-triangle',
    iconClassName: 'bg-warning/15 text-warning',
    message: 'High memory usage on Node A',
    time: '10 minutes ago',
  },
  {
    icon: 'circle-check',
    iconClassName: 'bg-success/15 text-success',
    message: 'Backup completed successfully',
    time: '1 hour ago',
  },
  {
    icon: 'user-plus',
    iconClassName: 'bg-primary/15 text-primary',
    message: 'New user registration: Sarah Miles',
    time: 'Just now',
  },
  {
    icon: 'bug',
    iconClassName: 'bg-danger/15 text-danger',
    message: 'Bug reported in payment module',
    time: '20 minutes ago',
  },
  {
    icon: 'message-circle',
    iconClassName: 'bg-info/15 text-info',
    message: 'New comment on Task #142',
    time: '15 minutes ago',
  },
  {
    icon: 'battery-charging',
    iconClassName: 'bg-warning/15 text-warning',
    message: 'Low battery on Device X',
    time: '45 minutes ago',
  },
  {
    icon: 'cloud-upload',
    iconClassName: 'bg-success/15 text-success',
    message: 'File upload completed',
    time: '1 hour ago',
  },
  {
    icon: 'calendar',
    iconClassName: 'bg-primary/15 text-primary',
    message: 'Team meeting scheduled at 3 PM',
    time: '2 hours ago',
  },
  {
    icon: 'download',
    iconClassName: 'bg-secondary/15 text-secondary',
    message: 'Report ready for download',
    time: '3 hours ago',
  },
  {
    icon: 'lock',
    iconClassName: 'bg-danger/15 text-danger',
    message: 'Multiple failed login attempts',
    time: '5 hours ago',
  },
  {
    icon: 'bell-ringing',
    iconClassName: 'bg-info/15 text-info',
    message: 'Reminder: Submit your timesheet',
    time: 'Today, 9:00 AM',
  },
]
</script>
