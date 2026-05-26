<template>
  <div class="topbar-item" id="notification-dropdown-alert">
    <BDropdown placement="bottom-end" :variant="null" no-caret toggle-class="topbar-link" menu-class="dropdown-menu-lg p-0" offset="5">
      <template #button-content>
        <span class="topbar-link-icon">
          <Icon icon="bell" />
        </span>
        <BBadge class="badge-square text-bg-warning topbar-badge">{{ notificationList.length }}</BBadge>
      </template>

      <div class="px-3 py-2 border-bottom">
        <BRow class="align-items-center">
          <BCol>
            <h6 class="m-0 fs-md fw-semibold">Notifications</h6>
          </BCol>
          <BCol class="text-end">
            <a href="#" class="badge text-bg-light badge-label py-1">{{ notificationList.length }} Alerts</a>
          </BCol>
        </BRow>
      </div>

      <simplebar style="max-height: 300px">
        <div v-for="notification in notificationList" class="dropdown-item notification-item py-2 text-wrap">
          <span class="d-flex gap-2">
            <span class="avatar-md flex-shrink-0">
              <span :class="['avatar-title rounded', notification.bgClass]">
                <Icon :icon="notification.icon" class="notification-item-icon fill-danger" />
              </span>
            </span>
            <span class="flex-grow-1 text-muted">
              <span class="fw-medium text-body">{{ notification.message }}</span>
              <br />
              <span class="fs-xs">{{ notification.time }}</span>
            </span>
            <BButton variant="link" type="button" class="flex-shrink-0 text-muted p-0" @click.stop.prevent="dismissNotification(notification.id)">
              <Icon icon="square-rounded-x" class="fs-xxl" />
            </BButton>
          </span>
        </div>
      </simplebar>

      <BDropdownItem class="text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2"> View All Alerts </BDropdownItem>
    </BDropdown>
  </div>
</template>

<script setup lang="ts">
import simplebar from 'simplebar-vue'
import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'

type NotificationItemType = {
  id: string
  icon: string
  bgClass: string
  fillClass: string
  message: string
  time: string
}

const notifications: NotificationItemType[] = [
  {
    id: 'notification-1',
    icon: 'server-bolt',
    bgClass: 'bg-danger-subtle text-danger',
    fillClass: 'fill-danger',
    message: 'Critical alert: Server crash detected',
    time: '30 minutes ago',
  },
  {
    id: 'notification-2',
    icon: 'alert-triangle',
    bgClass: 'bg-warning-subtle text-warning',
    fillClass: 'fill-warning',
    message: 'High memory usage on Node A',
    time: '10 minutes ago',
  },
  {
    id: 'notification-3',
    icon: 'circle-check',
    bgClass: 'bg-success-subtle text-success',
    fillClass: 'fill-success',
    message: 'Backup completed successfully',
    time: '1 hour ago',
  },
  {
    id: 'notification-4',
    icon: 'user-plus',
    bgClass: 'bg-primary-subtle text-primary',
    fillClass: 'fill-primary',
    message: 'New user registration: Sarah Miles',
    time: 'Just now',
  },
  {
    id: 'notification-5',
    icon: 'bug',
    bgClass: 'bg-danger-subtle text-danger',
    fillClass: 'fill-danger',
    message: 'Bug reported in payment module',
    time: '20 minutes ago',
  },
  {
    id: 'notification-6',
    icon: 'message-circle',
    bgClass: 'bg-info-subtle text-info',
    fillClass: 'fill-info',
    message: 'New comment on Task #142',
    time: '15 minutes ago',
  },
  {
    id: 'notification-7',
    icon: 'battery-charging',
    bgClass: 'bg-warning-subtle text-warning',
    fillClass: 'fill-warning',
    message: 'Low battery on Device X',
    time: '45 minutes ago',
  },
  {
    id: 'notification-8',
    icon: 'cloud-upload',
    bgClass: 'bg-success-subtle text-success',
    fillClass: 'fill-success',
    message: 'File upload completed',
    time: '1 hour ago',
  },
  {
    id: 'notification-9',
    icon: 'calendar',
    bgClass: 'bg-primary-subtle text-primary',
    fillClass: 'fill-primary',
    message: 'Team meeting scheduled at 3 PM',
    time: '2 hours ago',
  },
  {
    id: 'notification-10',
    icon: 'download',
    bgClass: 'bg-secondary-subtle text-secondary',
    fillClass: 'fill-secondary',
    message: 'Report ready for download',
    time: '3 hours ago',
  },
  {
    id: 'notification-11',
    icon: 'lock',
    bgClass: 'bg-danger-subtle text-danger',
    fillClass: 'fill-danger',
    message: 'Multiple failed login attempts',
    time: '5 hours ago',
  },
  {
    id: 'notification-12',
    icon: 'bell-ringing',
    bgClass: 'bg-info-subtle text-info',
    fillClass: 'fill-info',
    message: 'Reminder: Submit your timesheet',
    time: 'Today, 9:00 AM',
  },
]

const notificationList = ref<NotificationItemType[]>(notifications)

const dismissNotification = (id: string) => {
  notificationList.value = notificationList.value.filter((item) => item.id !== id)
}
</script>
