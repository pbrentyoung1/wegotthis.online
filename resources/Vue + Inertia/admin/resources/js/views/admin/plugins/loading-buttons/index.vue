<template>
  <PageBreadcrumb title="Loading Buttons" subtitle="Plugins" />
  <BContainer>
    <BRow class="justify-content-center">
      <BCol cols="12">
        <BCard no-body>
          <BCardHeader class="d-block">
            <BCardTitle class="mb-1">Ladda</BCardTitle>
            <p class="text-muted mb-0">
              A UI concept which merges loading indicators into the action that invoked them. Primarily intended for use with forms where it gives users immediate feedback upon submit rather than leaving them wondering while the browser does its thing.
            </p>
          </BCardHeader>
          <BCardBody>
            <div class="table-responsive-sm">
              <table class="table mb-0">
                <tbody>
                  <tr>
                    <td style="width: 50%">
                      <h5 class="mb-0">Expand Left</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-primary" data-style="expand-left">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Expand Right</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-primary" data-style="expand-right">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Expand Up</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-primary" data-style="expand-up">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Expand Down</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-primary" data-style="expand-down">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Contract</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-warning" data-style="contract">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Zoom In</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-warning" data-style="zoom-in">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Zoom Out</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-warning" data-style="zoom-out">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Slide Left</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-info" data-style="slide-left">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Slide Right</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-info" data-style="slide-right">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Slide Up</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-info" data-style="slide-up">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Slide Down</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-info" data-style="slide-down">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Expand Right (Progress)</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-danger" data-style="expand-right">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Contract (Progress)</h5>
                    </td>
                    <td>
                      <button class="ladda-button btn btn-danger" data-style="contract">Submit</button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5 class="mb-0">Zoom In (API demo)</h5>
                    </td>
                    <td>
                      <button class="ladda-button ladda-button-demo btn btn-primary" data-style="zoom-in">Submit</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import * as Ladda from 'ladda'
import { onMounted } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'

onMounted(() => {
  Ladda.bind('.ladda-button', { timeout: 2000 })
})
</script>
