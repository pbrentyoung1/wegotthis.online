<template>
  <PageBreadcrumb title="SiteMap" subtitle="Pages" />
  <BRow>
    <BCol md="4">
      <BCard no-body>
        <BCardBody>
          <h5 class="fw-bold text-uppercase">Dashboards</h5>
          <ul class="list-unstyled sitemap-list mt-3">
            <li v-for="(item, idx) in dashboardSitemapData" :key="idx">
              <Link href="" class="link-reset fw-semibold">{{ item.label }}</Link>
              <ul v-if="item.children">
                <li v-for="(child, index) in item.children" :key="index">
                  <Link href="" class="link-reset">{{ child.label }}</Link>
                </li>
              </ul>
            </li>
          </ul>
        </BCardBody>
      </BCard>
    </BCol>

    <BCol md="4">
      <BCard no-body>
        <BCardBody>
          <h5 class="fw-bold text-uppercase">Applications</h5>
          <ul class="list-unstyled sitemap-list mt-3">
            <li v-for="(app, idx) in applicationsData" :key="idx">
              <Link href="" class="link-reset fw-semibold">
                <Icon :icon="app.icon" v-if="app.icon" class="me-1 text-muted" />
                {{ app.label }}
              </Link>
              <ul v-if="app.children && app.children.length">
                <li v-for="child in app.children" :key="child.label">
                  <Link href="" class="link-reset">{{ child.label }}</Link>
                </li>
              </ul>
            </li>
          </ul>
        </BCardBody>
      </BCard>
    </BCol>

    <BCol md="4">
      <BCard no-body>
        <BCardBody>
          <h5 class="fw-bold text-uppercase">Reports & Settings</h5>
          <ul class="list-unstyled sitemap-list mt-3">
            <li v-for="(item, index) in reportsSettingsData" :key="index">
              <Link href="" :class="['fw-semibold', `link-${item.variant}`]">
                <Icon :icon="item.icon" v-if="item.icon" class="me-1" />
                {{ item.label }}
              </Link>
              <ul v-if="item.children && item.children.length > 0">
                <li v-for="(subItem, subIndex) in item.children" :key="subIndex">
                  <Link href="" class="link-reset">{{ subItem.label }}</Link>
                </li>
              </ul>
            </li>
          </ul>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { applicationsData, dashboardSitemapData, reportsSettingsData } from './components/data'
</script>
