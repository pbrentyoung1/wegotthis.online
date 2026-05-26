<template>
  <PageBreadcrumb title="Collapse" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol xl="12">
        <BCard no-body>
          <BCardHeader>
            <BCardTitle tag="h4">Examples</BCardTitle>
          </BCardHeader>

          <BCardBody>
            <p class="text-muted mb-2">Toggle the visibility of content across your project with a few classes and our JavaScript plugins.</p>

            <Link class="btn btn-link p-0 fw-semibold" href="https://bootstrap-vue-next.github.io/bootstrap-vue-next/docs/components/collapse.html" target="_blank">
              Collapse on vue Bootstrap
              <Icon icon="chevron-right" class="ms-1" />
            </Link>
          </BCardBody>
        </BCard>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Collapse" isCollapsable>
          <p>
            <Link class="btn btn-primary" v-b-toggle.collapseExample href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Link with href </Link>
            <button class="btn btn-primary ms-1" type="button" v-b-toggle.collapseExample aria-expanded="false" aria-controls="collapseExample">Button with data-bs-target</button>
          </p>
          <BCollapse show id="collapseExample">
            <div class="card card-body mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
          </BCollapse>
        </CardWithAction>

        <CardWithAction title="Multiple Targets" isCollapsable>
          <div class="d-flex flex-wrap gap-2 mb-3">
            <Link class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" v-b-toggle.multiCollapseExample1>Toggle first element</Link>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" v-b-toggle.multiCollapseExample2 aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" v-b-toggle="['multiCollapseExample1', 'multiCollapseExample2']" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
          </div>

          <BRow>
            <BCol>
              <BCollapse class="multi-collapse" id="multiCollapseExample1">
                <div class="card card-body mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
              </BCollapse>
            </BCol>
            <BCol>
              <BCollapse class="multi-collapse" id="multiCollapseExample2">
                <div class="card card-body mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
              </BCollapse>
            </BCol>
          </BRow>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Collapse Horizontal" isCollapsable>
          <p>
            <button class="btn btn-primary" type="button" v-b-toggle.collapseWidthExample aria-expanded="false" aria-controls="collapseWidthExample">Toggle width collapse</button>
          </p>
          <div style="height: 100px">
            <BCollapse horizontal class="collapse-horizontal" id="collapseWidthExample">
              <div class="card card-body mb-0" style="width: 300px">This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.</div>
            </BCollapse>
          </div>
        </CardWithAction>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCardHeader, BCardTitle, BCol, BCollapse, BRow } from 'bootstrap-vue-next'
import CardWithAction from '@/components/CardWithAction.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
</script>

<style scoped></style>
