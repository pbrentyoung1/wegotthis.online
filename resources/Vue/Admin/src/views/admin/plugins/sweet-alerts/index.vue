<template>
  <PageBreadcrumb title="SweetAlert2" subtitle="Plugins" />
  <div class="container">
    <div class="grid xl:grid-cols-1 gap-base">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Examples</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5 class="mb-1.25">Basic</h5>
                    <p class="text-default-400">Displays a simple SweetAlert popup.</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="sweetalert-basic" @click="executeExample('basicMessage')">Click me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">Title</h5>
                    <p class="text-default-400">A popup with a title and supporting text.</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="sweetalert-title" @click="executeExample('titleText')">Click Me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">HTML</h5>
                    <p class="text-default-400">Shows a popup with custom HTML content.</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="custom-html-alert" @click="executeExample('customHtml')">Toggle HTML SweetAlert</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">All States</h5>
                    <p class="text-default-400">Examples of SweetAlert in different alert states.</p>
                  </td>
                  <td>
                    <div class="flex flex-wrap gap-3">
                      <button type="button" id="sweetalert-info" class="btn btn-sm bg-info text-white" @click="executeExample('info')">Toggle Info</button>
                      <button type="button" id="sweetalert-warning" class="btn btn-sm bg-warning text-white" @click="executeExample('warning')">Toggle Warning</button>
                      <button type="button" id="sweetalert-error" class="btn btn-sm bg-danger text-white hover:bg-danger-hover" @click="executeExample('error')">Toggle Error</button>
                      <button type="button" id="sweetalert-success" class="btn btn-sm bg-success text-white" @click="executeExample('success')">Toggle Success</button>
                      <button type="button" id="sweetalert-question" class="btn btn-sm bg-primary text-white hover:bg-primary-hover" @click="executeExample('question')">Toggle Question</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">Long Content</h5>
                    <p class="text-default-400">A popup with extended content for demonstration.</p>
                  </td>
                  <td>
                    <button type="button" id="sweetalert-longcontent" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" @click="executeExample('longContent')">Click Me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">With Confirm Button</h5>
                    <p class="text-default-400">A confirmation dialog with an attached action.</p>
                  </td>
                  <td>
                    <button type="button" id="sweetalert-confirm-button" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" @click="executeExample('confirmButton')">Click Me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">With Cancel Button</h5>
                    <p class="text-default-400">Includes cancel and confirm options with different actions.</p>
                  </td>
                  <td>
                    <button type="button" id="sweetalert-params" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" @click="executeExample('cancelButton')">Click Me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">With Image Header (Logo)</h5>
                    <p class="text-default-400">Custom popup with a logo or image header.</p>
                  </td>
                  <td>
                    <button type="button" id="sweetalert-image" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" @click="executeExample('customImage')">Click Me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">Auto Close</h5>
                    <p class="text-default-400">Displays a popup that closes automatically after a timeout.</p>
                  </td>
                  <td>
                    <button type="button" id="sweetalert-close" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" @click="executeExample('timer')">Click Me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">Position</h5>
                    <p class="text-default-400">Shows the alert in different screen positions.</p>
                  </td>
                  <td>
                    <div class="flex flex-wrap gap-3">
                      <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-top-start" @click="openAlertWithPosition('top-start')">Top Start</button>
                      <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-top-end" @click="openAlertWithPosition('top-end')">Top End</button>
                      <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-bottom-start" @click="openAlertWithPosition('bottom-start')">Bottom Start</button>
                      <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="position-bottom-end" @click="openAlertWithPosition('bottom-end')">Bottom End</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">With Custom Padding, Background</h5>
                    <p class="text-default-400">Popup with custom dimensions, padding, and background style.</p>
                  </td>
                  <td>
                    <button type="button" id="custom-padding-width-alert" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" @click="executeExample('customBackground')">Click Me</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5 class="mb-1.25">Ajax Request</h5>
                    <p class="text-default-400">Demonstrates an alert with an Ajax request.</p>
                  </td>
                  <td>
                    <button type="button" id="ajax-alert" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover" @click="executeExample('ajaxRequest')">Click Me</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Swal, { type SweetAlertPosition } from 'sweetalert2'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import logoSm from '/images/logo-sm.png'

type TVueSwalInstance = typeof Swal & typeof Swal.fire

const openAlertWithPosition = (position: SweetAlertPosition) => {
  Swal.fire({
    icon: 'success',
    text: 'Saved successfully!',
    showConfirmButton: false,
    timer: 1500,
    position: position,
  })
}

const executeExample = (sub: string) => {
  switch (sub) {
    case 'basicMessage':
      ;(Swal as TVueSwalInstance).fire({
        title: 'Simple Alert',
        text: 'This is a basic SweetAlert dialog.',
        customClass: {
          confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2',
        },
      })
      return

    case 'titleText':
      ;(Swal as TVueSwalInstance).fire({
        title: 'Notice',
        text: 'This is a titled alert with additional details.',
        icon: 'question',
        showCloseButton: true,
        customClass: {
          confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2',
        },
      })
      return

    case 'errorType':
      ;(Swal as TVueSwalInstance).fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href>Why do I have this issue?</a>',
      })
      return
    case 'errorType':
      ;(Swal as TVueSwalInstance).fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href>Why do I have this issue?</a>',
      })
      return

    case 'customHtml':
      ;(Swal as TVueSwalInstance).fire({
        title: '<i>HTML</i> <u>Alert</u>',
        html: 'Use <b>bold</b>, <a href="#">links</a>, and other HTML here.',
        icon: 'info',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText:
          '<svg  xmlns="http://www.w3.org/2000/svg"  width="18"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="me-1 align-middle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" /></svg> Like it!',
        cancelButtonText:
          '<svg  xmlns="http://www.w3.org/2000/svg"  width="18"  height="18"  viewBox="0 0 24 24"  fill="currentColor"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 21.008a3 3 0 0 0 2.995 -2.823l.005 -.177v-4h2a3 3 0 0 0 2.98 -2.65l.015 -.173l.005 -.177l-.02 -.196l-1.006 -5.032c-.381 -1.625 -1.502 -2.796 -2.81 -2.78l-.164 .008h-8a1 1 0 0 0 -.993 .884l-.007 .116l.001 9.536a1 1 0 0 0 .5 .866a2.998 2.998 0 0 1 1.492 2.396l.007 .202v1a3 3 0 0 0 3 3z" /><path d="M5 14.008a1 1 0 0 0 .993 -.883l.007 -.117v-9a1 1 0 0 0 -.883 -.993l-.117 -.007h-1a2 2 0 0 0 -1.995 1.852l-.005 .15v7a2 2 0 0 0 1.85 1.994l.15 .005h1z" /></svg>',
        customClass: {
          confirmButton: 'btn bg-success! text-white hover:bg-success-hover me-2',
          cancelButton: 'btn bg-danger! text-white hover:bg-danger-hover',
        },
      })
      return

    case 'longContent':
      ;(Swal as TVueSwalInstance).fire({
        imageUrl: 'https://placehold.co/300x1000/1ab394/white',
        imageHeight: 1000,
        imageAlt: 'Very tall content image',
        showCloseButton: true,
        customClass: { confirmButton: 'btn bg-primary! text-white hover:bg-secondary-hover mt-2' },
      })
      return

    case 'confirmButton':
      ;(Swal as TVueSwalInstance)
        .fire({
          title: 'Confirm Deletion',
          text: 'Are you sure you want to delete this item?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          showCloseButton: true,
          buttonsStyling: false,
          customClass: {
            confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2 mt-2',
            cancelButton: 'btn bg-danger text-white hover:bg-danger-hover mt-2',
          },
        })
        .then((result: any) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: 'Deleted!',
              text: 'Your item has been successfully removed.',
              icon: 'success',
            })
          }
        })
      return

    case 'cancelButton':
      ;(Swal as TVueSwalInstance)
        .fire({
          title: 'Delete File?',
          text: 'This action cannot be undone!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          cancelButtonText: 'Cancel',
          showCloseButton: true,
          buttonsStyling: false,
          customClass: {
            confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2 mt-2 me-2',
            cancelButton: 'btn bg-danger! text-white hover:bg-danger-hover mt-2',
          },
        })
        .then((result: any) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: 'Deleted!',
              text: 'The file has been deleted.',
              icon: 'success',
            })
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Action Cancelled',
              text: 'Your file is safe.',
              icon: 'error',
            })
          }
        })
      return

    case 'customImage':
      ;(Swal as TVueSwalInstance).fire({
        title: 'Custom Branding',
        text: 'This alert includes a logo.',
        imageUrl: logoSm,
        imageHeight: 40,
        showCloseButton: true,
        customClass: {
          confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2',
        },
      })
      return

    case 'timer': {
      ;(Swal as TVueSwalInstance).fire({
        title: 'Auto Dismiss',
        html: 'Closing in <b></b> seconds...',
        timer: 2000,
        timerProgressBar: true,
        showCloseButton: true,
        customClass: {
          confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2',
        },
      })
      return
    }

    case 'customBackground': {
      ;(Swal as TVueSwalInstance).fire({
        title: 'Custom Design',
        html: '<p class="text-white">This alert has custom size, padding, and background.</p>',
        width: 600,
        padding: '100px',
        customClass: {
          confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2',
        },
        color: '#fff',
        background: `url('/images/stock/small-2.jpg') no-repeat center`,
      })
      return
    }

    case 'ajaxRequest':
      ;(Swal as TVueSwalInstance)
        .fire({
          title: 'Submit your Github username',
          input: 'text',
          inputAttributes: {
            autocapitalize: 'off',
          },
          showCancelButton: true,
          customClass: {
            confirmButton: 'btn bg-primary! text-white hover:bg-primary-hover me-2 mt-2',
            cancelButton: 'btn bg-danger! text-white hover:bg-danger-hover mt-2',
          },
          confirmButtonText: 'Submit',
          showLoaderOnConfirm: true,
          preConfirm: (login: any) => {
            return fetch(`//api.github.com/users/${login}`)
              .then((response) => {
                if (!response.ok) {
                  throw new Error(response.statusText)
                }
                return response.json()
              })
              .catch((error) => {
                ;(Swal as TVueSwalInstance).showValidationMessage(`Request failed: ${error}`)
              })
          },
          allowOutsideClick: () => !(Swal as TVueSwalInstance).isLoading(),
        })
        .then((result: any) => {
          if (result.isConfirmed) {
            ;(Swal as TVueSwalInstance).fire({
              title: `${result.value.login}'s avatar`,
              imageUrl: result.value.avatar_url,
            })
          }
        })
      return

    case 'success':
      ;(Swal as TVueSwalInstance).fire({
        text: 'Action completed successfully!',
        icon: 'success',
        confirmButtonText: 'Great!',
        customClass: { confirmButton: 'btn bg-success! text-white hover:bg-success-hover' },
      })
      return

    case 'error':
      ;(Swal as TVueSwalInstance).fire({
        text: 'An unexpected error occurred. Please try again.',
        icon: 'error',
        confirmButtonText: 'Dismiss',
        customClass: { confirmButton: 'btn bg-danger! text-white hover:bg-danger-hover' },
      })
      return

    case 'warning':
      ;(Swal as TVueSwalInstance).fire({
        text: 'Heads up! Something might require your attention.',
        icon: 'warning',
        confirmButtonText: 'Got it',
        customClass: { confirmButton: 'btn bg-warning! text-white hover:bg-warning-hover' },
      })
      return

    case 'info':
      ;(Swal as TVueSwalInstance).fire({
        text: 'This is an informational message to keep you updated.',
        icon: 'info',
        confirmButtonText: 'Understood',
        customClass: { confirmButton: 'btn bg-info! text-white hover:bg-info-hover' },
      })
      return

    case 'question':
      ;(Swal as TVueSwalInstance).fire({
        text: 'Do you need more information about this feature?',
        icon: 'question',
        confirmButtonText: 'Yes, please',
        customClass: { confirmButton: 'btn bg-primary! text-white hover:bg-info-hover' },
      })
      return
  }
}
</script>

<style></style>
