<template>
  <PageBreadcrumb subtitle="Plugins" title="Clipboard" />

  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Examples</h4>
      </div>

      <div class="card-body">
        <div class="table-wrapper">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5 class="mb-1.25">Copy from Element</h5>
                  <p class="text-default-400 mb-2.5">
                    Use
                    <code>data-clipboard-target</code>
                    to copy text from a specific element.
                  </p>
                </td>
                <td class="w-1/2">
                  <p class="text-primary mb-4 font-normal" ref="copytext">Click the button to copy this promotional text.</p>
                  <button class="btn btn-sm bg-primary hover:bg-primary-hover text-white" @click="copyFromElement(copytext)">
                    <Icon icon="copy" class="me-1"></Icon>
                    Copy Text
                  </button>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Cut from Textarea</h5>
                  <p class="text-default-400 mb-2.5">
                    Use
                    <code>data-clipboard-action</code>
                    with
                    <code>cut</code>
                    to remove and copy content.
                  </p>
                </td>
                <td class="w-1/2">
                  <textarea class="form-textarea" ref="cutArea">
                   This content will be cut and removed from this textarea.
                  </textarea>
                  <button class="btn btn-sm bg-primary hover:bg-primary-hover mt-5 text-white" @click="cutFromInput(cutArea)">
                    <Icon icon="copy" class="me-1"></Icon>
                    Cut Content
                  </button>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Copy Email Address</h5>
                  <p class="text-default-400 mb-2.5">Click the button to copy this contact email:</p>
                </td>
                <td class="w-1/2">
                  <span ref="copyEmail" class="text-primary block font-bold">support&#64;example.com</span>
                  <button class="btn btn-sm bg-primary hover:bg-primary-hover mt-2.5 text-white" @click="copyFromElement(copyEmail)">
                    <Icon icon="copy" class="me-1"></Icon>
                    Copy Email
                  </button>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Cut Input Value</h5>
                  <p class="text-default-400 mb-2.5">This cuts the value from a single-line input field.</p>
                </td>
                <td class="w-1/2">
                  <input type="text" ref="cutInput" class="form-input" value="Temporary token: 8GDF-393K-L99Z" />
                  <button class="btn btn-sm bg-danger hover:bg-danger-hover mt-2 text-white" @click="cutFromInput(cutInput)">
                    <Icon icon="copy" class="me-1"></Icon>
                    Cut Token
                  </button>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Copy Code Snippet</h5>
                  <p class="text-default-400 mb-2.5">Copy this snippet by clicking the button:</p>
                </td>

                <td class="w-1/2">
                  <pre><code ref="codeSnippet">npm install clipboard --save</code></pre>
                  <button class="btn btn-sm bg-success hover:bg-success-hover mt-4 text-white" @click="copyFromElement(codeSnippet)">
                    <Icon icon="copy" class="me-1"></Icon>
                    Copy Command
                  </button>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Copy from Input Group</h5>
                  <p class="text-default-400 mb-2.5">Click the copy icon to copy the link here:</p>
                </td>

                <td class="w-1/2">
                  <div class="input-group flex">
                    <input type="text" class="form-input" ref="copyLink" value="https://example.com/invite?ref=12345" readonly />
                    <button class="btn btn-icon bg-secondary text-white hover:bg-secondary-hover rounded-s-none" type="button" @click="copyFromElement(copyLink)">
                      <Icon icon="copy" class="text-lg"></Icon>
                    </button>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Copy Username</h5>
                  <p class="text-default-400 mb-2.5">Copy a predefined username from a span element.</p>
                </td>

                <td class="w-1/2">
                  <span ref="copyUsername" class="text-primary block font-bold">john_doe_92</span>
                  <button class="btn btn-sm bg-primary hover:bg-primary-hover mt-2 text-white" @click="copyFromElement(copyUsername)">
                    <Icon icon="copy" class="me-1"></Icon>
                    Copy Username
                  </button>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Copy Discount Code</h5>
                  <p class="text-default-400 mb-2.5">Copy a promotional discount code for checkout.</p>
                </td>

                <td class="w-1/2">
                  <div class="input-group flex">
                    <input type="text" ref="discountCode" class="form-input" value="SAVE20NOW" readonly />
                    <button class="btn btn-icon bg-warning text-white" type="button" @click="copyFromElement(discountCode)">
                      <Icon icon="copy" class="text-lg"></Icon>
                    </button>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <h5 class="mb-1.25">Copy HTML Template</h5>
                  <p class="text-default-400 mb-2.5">Copy a block of HTML code from a &lt;pre&gt; tag.</p>
                </td>

                <td class="w-1/2">
                  <code ref="htmlTemplate">&lt;button class="btn bg-info text-white hover:bg-info-hover"&gt;Click Me&lt;/button&gt;</code>
                  <br />
                  <button class="btn btn-sm bg-info hover:bg-info-hover mt-2 text-white" @click="copyFromElement(htmlTemplate)">
                    <Icon icon="copy" class="me-1"></Icon>
                    Copy HTML
                  </button>
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
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'

const copytext = ref<HTMLElement | null>(null)
const cutArea = ref<HTMLTextAreaElement | null>(null)
const copyEmail = ref<HTMLElement | null>(null)
const cutInput = ref<HTMLInputElement | null>(null)
const codeSnippet = ref<HTMLElement | null>(null)
const copyLink = ref<HTMLInputElement | null>(null)
const copyUsername = ref<HTMLElement | null>(null)
const discountCode = ref<HTMLInputElement | null>(null)
const htmlTemplate = ref<HTMLElement | null>(null)

const copyText = async (value: string) => {
  if (navigator.clipboard && window.isSecureContext) {
    return navigator.clipboard.writeText(value)
  } else {
    const textarea = document.createElement('textarea')
    textarea.value = value
    textarea.style.position = 'fixed'
    textarea.style.opacity = '0'
    document.body.appendChild(textarea)
    textarea.focus()
    textarea.select()
    document.execCommand('copy')
    document.body.removeChild(textarea)
  }
}

const cutText = (element: HTMLInputElement | HTMLTextAreaElement) => {
  element.select()
  document.execCommand('cut')
}

const highlightElementText = (el: HTMLElement) => {
  const range = document.createRange()
  range.selectNodeContents(el)
  const selection = window.getSelection()
  selection?.removeAllRanges()
  selection?.addRange(range)
}

const copyFromElement = (el: any) => {
  if (!el) return
  const value = el.value || el.innerText
  highlightElementText(el)
  copyText(value)
}

const cutFromInput = (el: any) => {
  if (!el) return
  cutText(el)
}
</script>
