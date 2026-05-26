<template>
  <PageBreadcrumb title="Alerts" subtitle="Base UI" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <CardWithAction title="Default Alert" isCollapsible>
        <div class="space-y-4">
          <div class="bg-primary/15 text-primary flex items-center rounded px-4 py-3" role="alert">This is a primary alert—something important you should know!</div>
          <div class="bg-secondary/15 text-secondary flex items-center rounded px-4 py-3" role="alert">This is a secondary alert—some additional context.</div>
          <div class="bg-success/15 text-success flex items-center rounded px-4 py-3" role="alert">Success! Your operation was completed successfully.</div>
          <div class="bg-danger/15 text-danger flex items-center rounded px-4 py-3" role="alert">Error! Something went wrong—please try again.</div>
          <div class="bg-warning/15 text-warning flex items-center rounded px-4 py-3" role="alert">Warning! Please double-check your inputs.</div>
          <div class="bg-info/15 text-info flex items-center rounded px-4 py-3" role="alert">Info: Here's something you might find useful.</div>
          <div class="bg-light/40 text-dark flex items-center rounded px-4 py-3" role="alert">Light alert—just a subtle notification.</div>
          <div class="bg-dark/15 text-dark flex items-center rounded px-4 py-3" role="alert">Dark alert—use for general-purpose messages.</div>
        </div>
      </CardWithAction>

      <CardWithAction title="Dismissing Alert with Solid Colors" isCollapsible>
        <div class="space-y-4">
          <div class="bg-primary flex items-center rounded px-4 py-3 text-white" role="alert">Heads up! This is a primary alert with important information.</div>
          <div class="bg-secondary flex items-center rounded px-4 py-3 text-white" role="alert">Notice: This is a secondary alert with supporting details.</div>
          <div class="bg-success flex items-center rounded px-4 py-3 text-white" role="alert">Success! Your action was completed successfully.</div>
          <div class="bg-danger flex items-center rounded px-4 py-3 text-white" role="alert">Error! Something went wrong—please try again later.</div>
          <div class="bg-warning flex items-center rounded px-4 py-3 text-white" role="alert">Warning! Please review your input before proceeding.</div>
          <div class="bg-info flex items-center rounded px-4 py-3 text-white" role="alert">Info: Here’s something you might find helpful.</div>
          <div class="bg-light text-dark flex items-center rounded px-4 py-3" role="alert">Note: This is a light alert with a subtle message.</div>
          <div class="bg-dark flex items-center rounded px-4 py-3 text-white" role="alert">Notice: This dark alert is great for general messages.</div>
        </div>
      </CardWithAction>

      <CardWithAction title="Link Color" isCollapsible>
        <div class="space-y-4">
          <div class="bg-primary/15 text-primary flex items-center gap-1 rounded px-4 py-3" role="alert">
            Need more info? Check out
            <a href="#" class="font-bold">this primary link</a>
            for important details.
          </div>

          <div class="bg-secondary/15 text-secondary flex items-center gap-1 rounded px-4 py-3" role="alert">
            Here's a secondary message with
            <a href="#" class="font-bold">a helpful link</a>
            for additional context.
          </div>

          <div class="bg-success/15 text-success flex items-center gap-1 rounded px-4 py-3" role="alert">
            Operation successful! View the results
            <a href="#" class="font-bold">by clicking here.</a>
          </div>

          <div class="bg-danger/15 text-danger flex items-center gap-1 rounded px-4 py-3" role="alert">
            Something went wrong. Learn more
            <a href="#" class="font-bold">through this alert link.</a>
          </div>

          <div class="bg-info/15 text-info flex items-center gap-1 rounded px-4 py-3" role="alert">
            Here’s some information that may help—click
            <a href="#" class="font-bold">this link</a>
            to read more.
          </div>

          <div class="bg-light text-dark flex items-center gap-1 rounded px-4 py-3" role="alert">
            Just a light reminder with
            <a href="#" class="font-bold">a gentle link</a>
            to explore.
          </div>

          <div class="bg-dark/15 text-dark flex items-center gap-1 rounded px-4 py-3" role="alert">
            This is a general dark alert. Find out more
            <a href="#" class="font-bold">by clicking here.</a>
          </div>
        </div>
      </CardWithAction>

      <CardWithAction title="Additional Content" isCollapsible>
        <div class="space-y-4">
          <div class="bg-success/15 text-success rounded p-6" role="alert">
            <h4 class="text-success mb-2 text-lg">Great job!</h4>
            <p class="mb-4">You’ve successfully read this important alert message. The text is intentionally a bit longer to demonstrate how spacing behaves in this kind of layout.</p>
            <hr class="border-success/20 my-4" />
            <p>Use margin utilities to keep your content clean and organized.</p>
          </div>

          <div class="bg-secondary/15 text-secondary flex gap-3 rounded p-6" role="alert">
            <Icon icon="alarm-snooze" class="size-8" />
            <div>
              <h4 class="text-secondary mb-2 text-lg">Heads up!</h4>
              <p class="mb-4">This alert message gives additional information with a longer message to show content spacing within an alert.</p>
              <hr class="border-secondary/20 my-4" />
              <p>Apply spacing classes wisely to maintain structure and clarity.</p>
            </div>
          </div>

          <div class="bg-danger/15 text-danger flex gap-3 rounded p-6" role="alert">
            <Icon icon="phone-ringing" class="size-8" />
            <div>
              <h4 class="text-danger mb-2 text-lg">Notice!</h4>
              <p class="mb-4">You’ve just read through a primary alert message. The extra length helps show how well the layout handles content spacing.</p>
              <button type="button" class="btn bg-danger btn-sm text-white">Got it</button>
            </div>
          </div>
        </div>
      </CardWithAction>

      <CardWithAction title="Custom Alerts" isCollapsible>
        <div class="space-y-4">
          <div id="dark-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 border-b-2 border-dark bg-dark/15 text-dark flex items-center rounded px-4 py-3" role="alert">
            A dark alert with a bottom border!

            <button class="ms-auto" data-hs-remove-element="#dark-alert">
              <Icon icon="x" class="text-2xl text-default-700" />
            </button>
          </div>

          <div id="success-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 border-2 border-dashed border-success bg-success/15 text-success flex items-center rounded px-4 py-3" role="alert">
            A success alert with a dashed border!

            <button class="ms-auto" data-hs-remove-element="#success-alert">
              <Icon icon="x" class="text-2xl text-default-700" />
            </button>
          </div>

          <div id="danger-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 border-2 border-danger bg-danger/15 text-danger flex items-center rounded px-4 py-3" role="alert">
            A danger alert with a thick border!

            <button class="ms-auto" data-hs-remove-element="#danger-alert">
              <Icon icon="x" class="text-2xl text-default-700" />
            </button>
          </div>

          <div id="warning-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-warning/15 text-warning flex items-center rounded px-4 py-3" role="alert">
            A warning alert with a custom close button!

            <button class="ms-auto size-7.5 flex justify-center items-center rounded-full bg-warning text-white" data-hs-remove-element="#warning-alert">
              <Icon icon="x" class="text-xl" />
            </button>
          </div>

          <div id="info-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-info/15 text-info flex items-center rounded px-4 py-3" role="alert">
            <div class="flex gap-3 items-center">
              <Icon icon="alert-octagon" class="text-xl" />
              An info alert with a custom icon!
            </div>

            <button class="ms-auto" data-hs-remove-element="#info-alert">
              <Icon icon="x" class="size-6 text-default-700" />
            </button>
          </div>

          <div class="border-light bg-light/20 text-light flex items-center gap-base rounded border-2 p-6" role="alert">
            <Icon icon="phone-ringing" class="text-success size-7" />
            <div class="text-default-400">
              <h4 class="text-default-400 mb-2 text-lg">Notice!</h4>
              <p>You’ve just read through a primary alert message. The extra length helps show how well the layout handles content spacing.</p>
            </div>
          </div>
        </div>
      </CardWithAction>

      <CardWithAction title="Dismiss Alerts" isCollapsible>
        <div class="space-y-4">
          <div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 border-primary bg-primary/15 text-primary flex items-center rounded border px-4 py-3" role="alert">
            A primary alert with a Dismiss Alerts!

            <button class="ms-auto" data-hs-remove-element="#dismiss-alert">
              <Icon icon="x" class="text-2xl text-default-700" />
            </button>
          </div>
        </div>
      </CardWithAction>
    </div>
  </div>
</template>

<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
