<template>
  <PageBreadcrumb title="Loading Buttons" subtitle="Plugins" />
  <div class="container">
    <div class="card">
      <div class="card-header block">
        <h4 class="card-title mb-1">Ladda</h4>
        <p class="text-default-400">A UI concept which merges loading indicators into the action that invoked them. Primarily intended for use with forms where it gives users immediate feedback upon submit rather than leaving them wondering while the browser does its thing.</p>
      </div>

      <div class="card-body">
        <div class="table-responsive-sm">
          <table class="table">
            <tbody>
              <tr>
                <td style="width: 50%">
                  <h5>Expand Left</h5>
                </td>
                <td>
                  <button class="ladda-button btn bg-primary text-white hover:bg-primary-hover" data-style="expand-left">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Expand Right</h5></td>
                <td>
                  <button class="ladda-button btn bg-primary text-white hover:bg-primary-hover" data-style="expand-right">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Expand Up</h5></td>
                <td>
                  <button class="ladda-button btn bg-primary text-white hover:bg-primary-hover" data-style="expand-up">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Expand Down</h5></td>
                <td>
                  <button class="ladda-button btn bg-primary text-white hover:bg-primary-hover" data-style="expand-down">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Contract</h5></td>
                <td>
                  <button class="ladda-button btn bg-warning text-white hover:bg-warning-hover" data-style="contract">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Zoom In</h5></td>
                <td>
                  <button class="ladda-button btn bg-warning text-white hover:bg-warning-hover" data-style="zoom-in">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Zoom Out</h5></td>
                <td>
                  <button class="ladda-button btn bg-warning text-white hover:bg-warning-hover" data-style="zoom-out">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Slide Left</h5></td>
                <td>
                  <button class="ladda-button btn bg-info text-white hover:bg-info-hover" data-style="slide-left">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Slide Right</h5></td>
                <td>
                  <button class="ladda-button btn bg-info text-white hover:bg-info-hover" data-style="slide-right">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Slide Up</h5></td>
                <td>
                  <button class="ladda-button btn bg-info text-white hover:bg-info-hover" data-style="slide-up">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Slide Down</h5></td>
                <td>
                  <button class="ladda-button btn bg-info text-white hover:bg-info-hover" data-style="slide-down">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Expand Right (Progress)</h5></td>
                <td>
                  <button class="ladda-button btn bg-danger text-white hover:bg-danger-hover" data-style="expand-right">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Contract (Progress)</h5></td>
                <td>
                  <button class="ladda-button btn bg-danger text-white hover:bg-danger-hover" data-style="contract">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Contract Overlay</h5></td>
                <td>
                  <button class="ladda-button btn bg-danger text-white hover:bg-danger-hover" data-style="contract-overlay" style="z-index: 1000">Submit</button>
                </td>
              </tr>

              <tr>
                <td><h5>Zoom In (API demo)</h5></td>
                <td>
                  <button class="ladda-button ladda-button-demo btn bg-primary text-white hover:bg-primary-hover" data-style="zoom-in">Submit</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import * as Ladda from 'ladda'
import { onMounted } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'

onMounted(() => {
  Ladda.bind('.ladda-button', { timeout: 2000 })
})
</script>
