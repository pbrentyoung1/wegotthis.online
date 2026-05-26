<template>
  <PageBreadcrumb title="Dropdowns" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol xl="12">
        <BCard no-body>
          <BCardHeader>
            <h4 class="card-title">Examples</h4>
          </BCardHeader>

          <BCardBody>
            <p class="text-muted">Toggle contextual overlays for displaying lists of links and more with the Bootstrap dropdown plugin.</p>

            <Link class="btn btn-link p-0 fw-semibold" href="https://bootstrap-vue-next.github.io/bootstrap-vue-next/docs/components/dropdown.html" target="_blank">
              Dropdowns on vue Bootstrap
              <Icon icon="chevron-right" class="ms-1" />
            </Link>
          </BCardBody>
        </BCard>

        <CardWithAction title="Single Button Dropdowns" isCollapsable>
          <p class="text-muted">
            Any single <code>.btn</code> can be turned into a dropdown toggle with some markup changes. Here’s how you can put them to work with either <code>&lt;button&gt;</code>
            elements:
          </p>

          <BRow>
            <div class="col-auto">
              <BDropdown variant="light" text="Choose Option">
                <BDropdownItem>Profile Settings</BDropdownItem>
                <BDropdownItem>Notifications</BDropdownItem>
                <BDropdownItem>Logout</BDropdownItem>
              </BDropdown>
            </div>

            <div class="col-auto">
              <BDropdown variant="primary" text="Quick Actions">
                <BDropdownItem>Create New</BDropdownItem>
                <BDropdownItem>Upload File</BDropdownItem>
                <BDropdownItem>View Reports</BDropdownItem>
              </BDropdown>
            </div>
          </BRow>
        </CardWithAction>

        <CardWithAction title="Menu Alignment" isCollapsable>
          <p class="text-muted">Add <code>.dropdown-menu-end</code> to a <code>.dropdown-menu</code> to right align the dropdown menu.</p>

          <BDropdown variant="light" text="Right-aligned menu">
            <BDropdownItem>Action</BDropdownItem>
            <BDropdownItem>Another action</BDropdownItem>
            <BDropdownItem>Something else here</BDropdownItem>
          </BDropdown>
        </CardWithAction>

        <CardWithAction title="Custom Dropdown Arrow" isCollapsable>
          <p class="text-muted">Any single <code>.btn</code> can be turned into a dropdown toggle with some markup changes. Here’s how you can put them to work with either <code>&lt;button&gt;</code> elements:</p>

          <BRow class="g-3">
            <div class="col-auto">
              <BDropdown variant="primary" toggle-class="drop-arrow-none" text="Without Arrow">
                <BDropdownItem href="#">Download Report</BDropdownItem>
                <BDropdownItem href="#">View Analytics</BDropdownItem>
                <BDropdownItem href="#">Export Data</BDropdownItem>
              </BDropdown>
            </div>

            <div class="col-auto">
              <BDropdown variant="outline-primary" toggle-class="drop-arrow-none">
                <template #button-content>
                  Custom Icon
                  <Icon icon="chevron-down" class="align-middle ms-1" />
                </template>
                <BDropdownItem href="#">Edit Profile</BDropdownItem>
                <BDropdownItem href="#">Account Settings</BDropdownItem>
                <BDropdownItem href="#">Sign Out</BDropdownItem>
              </BDropdown>
            </div>
          </BRow>
        </CardWithAction>

        <CardWithAction title="Split Button Dropdowns" isCollapsable>
          <p class="text-muted">
            Similarly, create split button dropdowns with virtually the same markup as single button dropdowns, but with the addition of
            <code>.dropdown-toggle-split</code> for proper spacing around the dropdown caret.
          </p>

          <div class="d-flex flex-wrap gap-2">
            <BDropdown split text="Primary" variant="primary" class="drop-arrow-none">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown split text="Secondary" variant="light">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown split text="Success" variant="soft-success" class="drop-arrow-none">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown split text="Info" variant="info">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown split text="Warning" variant="warning">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown split text="Danger" variant="danger">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Variant" isCollapsable>
          <p class="text-muted">The best part is you can do this with any button variant, too:</p>

          <div class="d-flex flex-wrap gap-2">
            <BDropdown text="Primary" variant="primary" class="btn-group">
              <BDropdownItem href="#">Create New</BDropdownItem>
              <BDropdownItem href="#">Save Changes</BDropdownItem>
              <BDropdownItem href="#">Publish Now</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">View Drafts</BDropdownItem>
            </BDropdown>

            <BDropdown text="Secondary" variant="light" class="btn-group">
              <BDropdownItem href="#">Settings</BDropdownItem>
              <BDropdownItem href="#">Preferences</BDropdownItem>
              <BDropdownItem href="#">Account Info</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Logout</BDropdownItem>
            </BDropdown>

            <BDropdown text="Success" variant="success" class="btn-group">
              <BDropdownItem href="#">Mark as Complete</BDropdownItem>
              <BDropdownItem href="#">Download Report</BDropdownItem>
              <BDropdownItem href="#">Submit Review</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Archive Task</BDropdownItem>
            </BDropdown>

            <BDropdown text="Info" variant="info" class="btn-group">
              <BDropdownItem href="#">View Logs</BDropdownItem>
              <BDropdownItem href="#">System Info</BDropdownItem>
              <BDropdownItem href="#">Help Center</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Contact Support</BDropdownItem>
            </BDropdown>

            <BDropdown text="Warning" variant="warning" class="btn-group">
              <BDropdownItem href="#">Pending Approvals</BDropdownItem>
              <BDropdownItem href="#">Overdue Tasks</BDropdownItem>
              <BDropdownItem href="#">Subscription Expiring</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Renew Plan</BDropdownItem>
            </BDropdown>

            <BDropdown text="Danger" variant="danger" class="btn-group">
              <BDropdownItem href="#">Delete Item</BDropdownItem>
              <BDropdownItem href="#">Revoke Access</BDropdownItem>
              <BDropdownItem href="#">Reset Password</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Permanently Remove</BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Sizing" isCollapsable>
          <p class="text-muted">Button dropdowns work with buttons of all sizes, including default and split dropdown buttons.</p>

          <div class="d-flex flex-wrap gap-2">
            <BDropdown variant="light" size="lg" text="Large button" class="btn-group">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown variant="light" size="lg" split text="Large button" class="btn-group">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown variant="light" size="sm" text="Small button" class="btn-group">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown variant="light" size="sm" split text="Small button" class="btn-group">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Dropup Variation" isCollapsable>
          <p class="text-muted">
            Trigger dropdown menus above elements by adding
            <code>dropup</code> to the parent element.
          </p>

          <div class="d-flex flex-wrap gap-2">
            <BDropdown variant="light" text="Dropup" end placement="top" class="btn-group">
              <BDropdownItem href="#">Upload File</BDropdownItem>
              <BDropdownItem href="#">Sync Data</BDropdownItem>
              <BDropdownItem href="#">Import from CSV</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Advanced Settings</BDropdownItem>
            </BDropdown>

            <BDropdown variant="light" text="Split dropup" placement="top" split class="btn-group">
              <BDropdownItem href="#">New Task</BDropdownItem>
              <BDropdownItem href="#">Assign User</BDropdownItem>
              <BDropdownItem href="#">Set Deadline</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Project Settings</BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Dropstart Variation" isCollapsable>
          <p class="text-muted">
            Trigger dropdown menus at the left of the elements by adding
            <code>dropstart</code> to the parent element.
          </p>

          <div class="d-flex flex-wrap gap-2">
            <BDropdown variant="secondary" text="Dropstart" placement="left" class="btn-group">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>

            <BDropdown variant="secondary" text="Split dropstart" placement="left" split class="btn-group">
              <BDropdownItem href="#">Action</BDropdownItem>
              <BDropdownItem href="#">Another action</BDropdownItem>
              <BDropdownItem href="#">Something else here</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Separated link</BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Dropend Variation" isCollapsable>
          <p class="text-muted">
            Trigger dropdown menus at the right of the elements by adding
            <code>dropend</code> to the parent element.
          </p>

          <div class="d-flex flex-wrap gap-2">
            <BDropdown variant="primary" text="Dropend" placement="right" class="btn-group">
              <BDropdownItem href="#">View Profile</BDropdownItem>
              <BDropdownItem href="#">Message User</BDropdownItem>
              <BDropdownItem href="#">Report Issue</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Block User</BDropdownItem>
            </BDropdown>

            <BDropdown variant="primary" text="Split Dropend" placement="right" split class="btn-group">
              <BDropdownItem href="#">New Invoice</BDropdownItem>
              <BDropdownItem href="#">Send Reminder</BDropdownItem>
              <BDropdownItem href="#">Duplicate</BDropdownItem>
              <BDropdownDivider />
              <BDropdownItem href="#">Delete Invoice</BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Active Item" isCollapsable>
          <p class="text-muted">Add <code>.active</code> to item in the dropdown to <strong>style them as active</strong>.</p>

          <BDropdown variant="secondary" text="Active Item" class="btn-group">
            <BDropdownItem href="#">Regular link</BDropdownItem>
            <BDropdownItem active href="#">Active link</BDropdownItem>
            <BDropdownItem href="#">Another link</BDropdownItem>
          </BDropdown>
        </CardWithAction>

        <CardWithAction title="Disabled Item" isCollapsable>
          <p class="text-muted">Add <code>.disabled</code> to items in the dropdown to <strong>style them as disabled</strong>.</p>

          <BDropdown variant="secondary" text="Disable Item" class="btn-group">
            <BDropdownItem href="#">Regular link</BDropdownItem>
            <BDropdownItem disabled href="#">Disable link </BDropdownItem>
            <BDropdownItem href="#">Another link</BDropdownItem>
          </BDropdown>
        </CardWithAction>

        <CardWithAction title="Headers" isCollapsable>
          <p class="text-muted">Add a header to label sections of actions in any dropdown menu.</p>

          <BDropdown variant="secondary" text="Header" class="btn-group">
            <BDropdownHeader tag="h5">Dropdown header </BDropdownHeader>
            <BDropdownItem href="#">Action</BDropdownItem>
            <BDropdownItem href="#">Another action </BDropdownItem>
          </BDropdown>
        </CardWithAction>

        <CardWithAction title="Dark Dropdowns" isCollapsable>
          <p class="text-muted">Opt into darker dropdowns to match a dark navbar or custom style by adding <code>.dropdown-menu-dark</code> onto an existing <code>.dropdown-menu</code>. No changes are required to the dropdown items.</p>

          <BDropdown variant="dark" text="Header" class="btn-group">
            <BDropdownItem href="#" active>Dashboard </BDropdownItem>
            <BDropdownItem href="#">My Orders </BDropdownItem>
            <BDropdownItem href="#">Billing Settings </BDropdownItem>
            <BDropdownDivider />
            <BDropdownItem href="#">Logout</BDropdownItem>
          </BDropdown>
        </CardWithAction>

        <CardWithAction title="Centered Dropdowns" isCollapsable>
          <p class="text-muted">
            Make the dropdown menu centered below the toggle with
            <code>.dropdown-center</code> on the parent element.
          </p>

          <div class="hstack gap-2">
            <BDropdown text="Centered dropdown" variant="secondary" menu-class="dropdown-center">
              <BDropdownItem>Action</BDropdownItem>
              <BDropdownItem>Action two </BDropdownItem>
              <BDropdownItem>Action three </BDropdownItem>
            </BDropdown>

            <BDropdown text="Centered dropup" variant="secondary" placement="top-center">
              <BDropdownItem>Action</BDropdownItem>
              <BDropdownItem>Action two </BDropdownItem>
              <BDropdownItem>Action three </BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Dropdown Options" isCollapsable>
          <p class="text-muted">
            Use <code>data-bs-offset</code> or
            <code>data-bs-reference</code>
            to change the location of the dropdown.
          </p>

          <div class="d-flex flex-wrap gap-2">
            <BDropdown variant="secondary" text="Offset" :offset="{ alignmentAxis: 10, crossAxis: 10, mainAxis: 20 }">
              <li>
                <BDropdownItem href="#">Profile Settings</BDropdownItem>
              </li>
              <li>
                <BDropdownItem href="#">Privacy Settings</BDropdownItem>
              </li>
              <li>
                <BDropdownItem href="#"> Notification Preferences </BDropdownItem>
              </li>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Auto Close Behavior" isCollapsable>
          <p class="text-muted">By default, the dropdown menu is closed when clicking inside or outside the dropdown menu. You can use the <code>autoClose</code> option to change this behavior of the dropdown.</p>

          <div class="hstack gap-2">
            <BDropdown text="Default dropdown" variant="secondary" auto-close="true">
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
            </BDropdown>

            <BDropdown text="Clickable inside" variant="secondary" auto-close="inside">
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
            </BDropdown>

            <BDropdown text="Clickable outside" variant="secondary" auto-close="outside">
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
            </BDropdown>

            <BDropdown text="Manual close" variant="secondary" auto-close="false">
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
              <BDropdownItem href="#">Menu item</BDropdownItem>
            </BDropdown>
          </div>
        </CardWithAction>

        <CardWithAction title="Text" isCollapsable>
          <p class="text-muted">Place any freeform text within a dropdown menu with text and use spacing utilities. Note that you’ll likely need additional sizing styles to constrain the menu width.</p>

          <BDropdown variant="primary" text="Text Dropdown" class="d-inline-block" menu-class="p-3 text-muted">
            <p>Some example text that's free-flowing within the dropdown menu.</p>
            <p class="mb-0">And this is more example text.</p>
          </BDropdown>
        </CardWithAction>

        <CardWithAction title="Forms" isCollapsable>
          <p class="text-muted">Put a form within a dropdown menu, or make it into a dropdown menu, and use margin or padding utilities to give it the negative space you require.</p>
          <BDropdown variant="secondary" text="Form" class="d-inline-block" menu-class="p-3">
            <form class="px-2 py-2" @submit.prevent>
              <div class="mb-3">
                <label for="dropdownEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="dropdownEmail" placeholder="email@example.com" />
              </div>
              <div class="mb-3">
                <label for="dropdownPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="dropdownPassword" placeholder="Password" />
              </div>
              <div class="mb-2">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dropdownCheck" />
                  <label class="form-check-label" for="dropdownCheck"> Remember me </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Sign in</button>
            </form>

            <hr class="dropdown-divider" />
            <BDropdownItem href="#">New around here? Sign up </BDropdownItem>
            <BDropdownItem href="#"> Forgot password? </BDropdownItem>
          </BDropdown>
        </CardWithAction>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCardHeader, BCol, BDropdown, BDropdownDivider, BDropdownHeader, BDropdownItem, BRow } from 'bootstrap-vue-next'
import CardWithAction from '@/components/CardWithAction.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
</script>

<style scoped></style>
