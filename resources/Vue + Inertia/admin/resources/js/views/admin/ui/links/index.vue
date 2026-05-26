<template>
  <PageBreadcrumb title="Links" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol xl="12">
        <CardWithAction title="Examples" isCollapsable>
          <p class="text-muted mb-2">Documentation and examples for Colored links with hover states.</p>
          <Link class="btn btn-link p-0 fw-semibold" href="https://getbootstrap.com/docs/5.3/helpers/colored-links/" target="_blank">
            Links on Bootstrap
            <Icon icon="chevron-right" class="ms-1" />
          </Link>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Colored Links" isCollapsable>
          <p class="text-muted">
            You can use the <code>.link-*</code> classes to colorize links. Unlike the <Link href="/ui/utilities"><code>.text-*</code> classes</Link>, these classes have a <code>:hover</code> and <code>:focus</code> state.
          </p>

          <p><Link href="#" class="link-primary">Primary link</Link></p>
          <p><Link href="#" class="link-secondary">Secondary link</Link></p>
          <p><Link href="#" class="link-success">Success link</Link></p>
          <p><Link href="#" class="link-danger">Danger link</Link></p>
          <p><Link href="#" class="link-warning">Warning link</Link></p>
          <p><Link href="#" class="link-info">Info link</Link></p>
          <p><Link href="#" class="link-light">Light link</Link></p>
          <p><Link href="#" class="link-dark">Dark link</Link></p>
          <p class="mb-0"><Link href="#" class="link-body-emphasis">Emphasis link</Link></p>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Link Utilities" isCollapsable>
          <p class="text-muted"><Link href="/ui/utilities">Colored link helpers</Link> have been updated to pair with our link utilities. Use the new utilities to modify the link opacity, underline opacity, and underline offset.</p>

          <p><Link href="#" class="link-primary text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Primary link</Link></p>
          <p><Link href="#" class="link-secondary text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Secondary link</Link></p>
          <p><Link href="#" class="link-success text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Success link</Link></p>
          <p><Link href="#" class="link-danger text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Danger link</Link></p>
          <p><Link href="#" class="link-warning text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Warning link</Link></p>
          <p><Link href="#" class="link-info text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Info link</Link></p>
          <p><Link href="#" class="link-light text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Light link</Link></p>
          <p><Link href="#" class="link-dark text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Dark link</Link></p>
          <p><Link href="#" class="link-body-emphasis text-decoration-underline link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Emphasis link</Link></p>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Link Opacity" isCollapsable>
          <p class="text-muted">Change the alpha opacity of the link <code>rgba()</code> color value with utilities.</p>
          <p><Link class="link-opacity-10" href="#">Link opacity 10</Link></p>
          <p><Link class="link-opacity-25" href="#">Link opacity 25</Link></p>
          <p><Link class="link-opacity-50" href="#">Link opacity 50</Link></p>
          <p><Link class="link-opacity-75" href="#">Link opacity 75</Link></p>
          <p class="mb-0"><Link class="link-opacity-100" href="#">Link opacity 100</Link></p>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Link Hover Opacity" isCollapsable>
          <p class="text-muted">You can even change the opacity level on hover.</p>
          <p><Link class="link-opacity-10-hover" href="#">Link hover opacity 10</Link></p>
          <p><Link class="link-opacity-25-hover" href="#">Link hover opacity 25</Link></p>
          <p><Link class="link-opacity-50-hover" href="#">Link hover opacity 50</Link></p>
          <p><Link class="link-opacity-75-hover" href="#">Link hover opacity 75</Link></p>
          <p class="mb-0"><Link class="link-opacity-100-hover" href="#">Link hover opacity 100</Link></p>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Underline Color" isCollapsable>
          <p class="text-muted">Change the underline’s color independent of the link text color.</p>
          <p><Link href="#" class="text-decoration-underline link-underline-primary">Primary underline</Link></p>
          <p><Link href="#" class="text-decoration-underline link-underline-secondary">Secondary underline</Link></p>
          <p><Link href="#" class="text-decoration-underline link-underline-success">Success underline</Link></p>
          <p><Link href="#" class="text-decoration-underline link-underline-danger">Danger underline</Link></p>
          <p><Link href="#" class="text-decoration-underline link-underline-warning">Warning underline</Link></p>
          <p><Link href="#" class="text-decoration-underline link-underline-info">Info underline</Link></p>
          <p><Link href="#" class="text-decoration-underline link-underline-light">Light underline</Link></p>
          <p class="mb-0"><Link href="#" class="text-decoration-underline link-underline-dark">Dark underline</Link></p>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Underline Opacity" isCollapsable>
          <p class="text-muted">Change the underline’s opacity. Requires adding <code>.link-underline</code> first.</p>
          <p><Link class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-0" href="#">Underline opacity 0</Link></p>
          <p><Link class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-10" href="#">Underline opacity 10</Link></p>
          <p><Link class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-25" href="#">Underline opacity 25</Link></p>
          <p><Link class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-50" href="#">Underline opacity 50</Link></p>
          <p><Link class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-75" href="#">Underline opacity 75</Link></p>
          <p class="mb-0"><Link class="text-decoration-underline link-offset-2 link-underline link-underline-opacity-100" href="#">Underline opacity 100</Link></p>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Underline Offset" isCollapsable>
          <p class="text-muted">Change the underline’s offset. Requires adding <code>.link-underline</code> first.</p>
          <p><Link href="#">Default link</Link></p>
          <p><Link class="text-decoration-underline link-offset-1" href="#">Offset 1 link</Link></p>
          <p><Link class="text-decoration-underline link-offset-2" href="#">Offset 2 link</Link></p>
          <p class="mb-0"><Link class="text-decoration-underline link-offset-3" href="#">Offset 3 link</Link></p>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Hover Variants" isCollapsable>
          <p class="text-muted">Just like the <code>.link-opacity-*-hover</code> utilities, <code>.link-offset</code> and <code>.link-underline-opacity</code> utilities include <code>:hover</code> variants by default. Mix and match to create unique link styles.</p>
          <Link class="link-offset-2 link-offset-3-hover text-decoration-underline link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="#"> Underline opacity 0 </Link>
        </CardWithAction>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCol, BRow } from 'bootstrap-vue-next'
import CardWithAction from '@/components/CardWithAction.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
</script>
