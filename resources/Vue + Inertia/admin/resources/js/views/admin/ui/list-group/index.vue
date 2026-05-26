<template>
  <PageBreadcrumb title="List Group" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol lg="12">
        <CardWithAction title="Examples" isCollapsable>
          <p class="text-muted mb-2">List groups are a flexible and powerful component for displaying a series of content. Modify and extend them to support just about any content within.</p>
          <Link class="btn btn-link p-0 fw-semibold" href="https://bootstrap-vue-next.github.io/bootstrap-vue-next/docs/components/list-group.html" target="_blank">
            List Group on Bootstrap
            <Icon icon="chevron-right" class="ms-1" />
          </Link>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Basic Example" isCollapsable>
          <p class="text-muted">The most basic list group is an unordered list with list items and the proper classes. Build upon it with the options that follow, or with your own CSS as needed.</p>
          <ul class="list-group">
            <li class="list-group-item">Dropbox Cloud Storage</li>
            <li class="list-group-item">Slack Team Collaboration</li>
            <li class="list-group-item">Microsoft Windows OS</li>
            <li class="list-group-item">Zendesk Customer Support</li>
            <li class="list-group-item">Stripe Payment Integration</li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Active Items" isCollapsable>
          <p class="text-muted">Add <code>.active</code> to a <code>.list-group-item</code> to indicate the current active selection.</p>
          <ul class="list-group">
            <li class="list-group-item active">GitHub Repository</li>
            <li class="list-group-item">Figma Design Tool</li>
            <li class="list-group-item">Notion Workspace</li>
            <li class="list-group-item">Trello Task Manager</li>
            <li class="list-group-item">DigitalOcean Cloud</li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Disabled Items" isCollapsable>
          <p>Add <code>.disabled</code> to a <code>.list-group-item</code> to make it <em>appear</em> disabled.</p>
          <ul class="list-group">
            <li class="list-group-item disabled" aria-disabled="true">Dropbox Cloud Storage</li>
            <li class="list-group-item">Slack Team Collaboration</li>
            <li class="list-group-item">Microsoft Windows OS</li>
            <li class="list-group-item">Zendesk Customer Support</li>
            <li class="list-group-item">Stripe Payment Integration</li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Links and Buttons" isCollapsable>
          <p class="text-muted">
            Use <code>&lt;a&gt;</code>s or <code>&lt;button&gt;</code>s to create <em>actionable</em>
            list group items with hover, disabled, and active states by adding
            <code>.list-group-item-action</code>.
          </p>
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">Stripe Payment Integration</a>
            <a href="#" class="list-group-item list-group-item-action">Dropbox Cloud Service</a>
            <button type="button" class="list-group-item list-group-item-action">Slack Communication</button>
            <button type="button" class="list-group-item list-group-item-action">Notion Productivity App</button>
            <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1">Zendesk Support Tool</a>
          </div>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Flush" isCollapsable>
          <p class="text-muted">Add <code>.list-group-flush</code> to remove some borders and rounded corners to render list group items edge-to-edge in a parent container (e.g., cards).</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Slack Collaboration Tool</li>
            <li class="list-group-item">Dropbox Cloud Storage</li>
            <li class="list-group-item">Notion Workspace Organizer</li>
            <li class="list-group-item">Zendesk Customer Support</li>
            <li class="list-group-item">Stripe Payment Processor</li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Horizontal" isCollapsable>
          <p class="text-muted">Add <code>.list-group-horizontal</code> to change the layout of list group items from vertical to horizontal across all breakpoints.</p>
          <ul class="list-group list-group-horizontal mb-3">
            <li class="list-group-item">Slack</li>
            <li class="list-group-item">Notion</li>
            <li class="list-group-item">Dropbox</li>
          </ul>
          <ul class="list-group list-group-horizontal-sm mb-3">
            <li class="list-group-item">Figma</li>
            <li class="list-group-item">Stripe</li>
            <li class="list-group-item">Zendesk</li>
          </ul>
          <ul class="list-group list-group-horizontal-md">
            <li class="list-group-item">Trello</li>
            <li class="list-group-item">Asana</li>
            <li class="list-group-item">ClickUp</li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Contextual Classes" isCollapsable>
          <p class="text-muted">Use contextual classes to style list items with a stateful background and color.</p>
          <ul class="list-group">
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item list-group-item-primary">A simple primary list group item</li>
            <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
            <li class="list-group-item list-group-item-success">A simple success list group item</li>
            <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
            <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
            <li class="list-group-item list-group-item-info">A simple info list group item</li>
            <li class="list-group-item list-group-item-light">A simple light list group item</li>
            <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Contextual Classes with Link" isCollapsable>
          <p class="text-muted">Use contextual classes to style list items with a stateful background and color.</p>
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Darius ac facilities in</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">A simple primary list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-success">A simple success list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-danger">A simple danger list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-warning">A simple warning list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-info">A simple info list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A simple dark list group item</a>
          </div>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Custom Content" isCollapsable>
          <p class="text-muted">Add nearly any HTML within, even for linked list groups, with the help of flexbox utilities.</p>
          <div class="list-group">
            <Link href="#" class="list-group-item list-group-item-action active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-2">List group item heading</h5>
                <small>3 days ago</small>
              </div>
              <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              <small>Donec id elit non mi porta.</small>
            </Link>
            <Link href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-2">List group item heading</h5>
                <small class="text-muted">3 days ago</small>
              </div>
              <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              <small class="text-muted">Donec id elit non mi porta.</small>
            </Link>
            <Link href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-2">List group item heading</h5>
                <small class="text-muted">3 days ago</small>
              </div>
              <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              <small class="text-muted">Donec id elit non mi porta.</small>
            </Link>
          </div>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="With Badges" isCollapsable>
          <p class="text-muted">Add badges to any list group item to show counts, activity, and more.</p>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">Gmail Notifications <span class="badge bg-primary rounded-pill">14</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Unprocessed Orders <span class="badge bg-success rounded-pill">2</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Urgent Tickets <span class="badge bg-danger rounded-pill">99+</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Completed Transactions <span class="badge bg-success rounded-pill">20+</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Invoices Awaiting Approval <span class="badge bg-warning rounded-pill">12</span></li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Checkboxes and Radios" isCollapsable>
          <p class="text-muted">Place Bootstrap’s checkboxes and radios within list group items.</p>
          <ul class="list-group">
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" id="newsletterCheckbox" />
              <label class="form-check-label" for="newsletterCheckbox">Subscribe to newsletter</label>
            </li>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" id="termsCheckbox" />
              <label class="form-check-label" for="termsCheckbox">Accept terms and conditions</label>
            </li>
          </ul>
          <ul class="list-group mt-2">
            <li class="list-group-item">
              <input class="form-check-input me-1" type="radio" name="notificationOptions" id="emailRadio" checked />
              <label class="form-check-label" for="emailRadio">Notify by Email</label>
            </li>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="radio" name="notificationOptions" id="smsRadio" />
              <label class="form-check-label" for="smsRadio">Notify by SMS</label>
            </li>
          </ul>
        </CardWithAction>
      </BCol>

      <BCol xl="4">
        <CardWithAction title="Numbered" isCollapsable>
          <p class="text-muted">Numbers are generated by <code>counter-reset</code> on the <code>&lt;ol&gt;</code>, and styled via <code>::before</code>.</p>
          <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Premium Admin</div>
                HTML Admin
              </div>
              <span class="badge bg-primary rounded-pill">865</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Premium React Admin</div>
                React Admin
              </div>
              <span class="badge bg-primary rounded-pill">140</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Premium Angular Version</div>
                Angular Version
              </div>
              <span class="badge bg-primary rounded-pill">85</span>
            </li>
          </ol>
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
