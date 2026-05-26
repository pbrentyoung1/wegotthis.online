<template>
  <PageBreadcrumb title="Buttons" subtitle="Base UI" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <CardWithAction title="Default Buttons" isCollapsible>
        <p class="text-default-400 mb-4">
          Use the
          <code>.btn</code>
          class on
          <code>&lt;a&gt;</code>
          ,
          <code>&lt;button&gt;</code>
          , or
          <code>&lt;input&gt;</code>
          elements to quickly create a styled button.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn border-default-300">Default</button>
          <button type="button" class="btn bg-primary hover:bg-primary-hover text-white">Primary</button>
          <button type="button" class="btn bg-secondary hover:bg-secondary-hover text-white">Secondary</button>
          <button type="button" class="btn bg-success hover:bg-success-hover text-white">Success</button>
          <button type="button" class="btn bg-danger hover:bg-danger-hover text-white">Danger</button>
          <button type="button" class="btn bg-warning hover:bg-warning-hover text-white">Warning</button>
          <button type="button" class="btn bg-info hover:bg-info-hover text-white">Info</button>
          <button type="button" class="btn bg-light text-dark hover:bg-light-hover">Light</button>
          <button type="button" class="btn bg-dark hover:bg-dark-hover text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Button Rounded" isCollapsible>
        <p class="text-default-400 mb-4">
          Add
          <code>.rounded-full</code>
          to buttons to give them smooth, pill-shaped corners.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn border-default-300 rounded-full">Default</button>
          <button type="button" class="btn bg-primary hover:bg-primary-hover rounded-full text-white">Primary</button>
          <button type="button" class="btn bg-secondary hover:bg-secondary-hover rounded-full text-white">Secondary</button>
          <button type="button" class="btn bg-success hover:bg-success-hover rounded-full text-white">Success</button>
          <button type="button" class="btn bg-danger hover:bg-danger-hover rounded-full text-white">Danger</button>
          <button type="button" class="btn bg-warning hover:bg-warning-hover rounded-full text-white">Warning</button>
          <button type="button" class="btn bg-info hover:bg-info-hover rounded-full text-white">Info</button>
          <button type="button" class="btn bg-light text-dark hover:bg-light-hover rounded-full">Light</button>
          <button type="button" class="btn bg-dark hover:bg-dark-hover rounded-full text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Button Outline" isCollapsible>
        <p class="text-default-400 mb-4">
          Use the
          <code>.border-*</code>
          classes to create buttons with colored borders.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn border-primary text-primary hover:bg-primary hover:text-white">Primary</button>
          <button type="button" class="btn border-secondary text-secondary hover:bg-secondary hover:text-white">Secondary</button>
          <button type="button" class="btn border-success text-success hover:bg-success hover:text-white">Success</button>
          <button type="button" class="btn border-danger text-danger hover:bg-danger hover:text-white">Danger</button>
          <button type="button" class="btn border-warning text-warning hover:bg-warning hover:text-white">Warning</button>
          <button type="button" class="btn border-info text-info hover:bg-info hover:text-white">Info</button>
          <button type="button" class="btn border-light text-dark hover:bg-light hover:text-dark">Light</button>
          <button type="button" class="btn border-dark text-dark hover:bg-dark hover:text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Button Outline Rounded" isCollapsible>
        <p class="text-default-400 mb-4">
          Apply
          <code>.rounded-full</code>
          to outline buttons to give them smooth, pill-shaped corners.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn border-primary text-primary hover:bg-primary rounded-full hover:text-white">Primary</button>
          <button type="button" class="btn border-secondary text-secondary hover:bg-secondary rounded-full hover:text-white">Secondary</button>
          <button type="button" class="btn border-success text-success hover:bg-success rounded-full hover:text-white">Success</button>
          <button type="button" class="btn border-danger text-danger hover:bg-danger rounded-full hover:text-white">Danger</button>
          <button type="button" class="btn border-warning text-warning hover:bg-warning rounded-full hover:text-white">Warning</button>
          <button type="button" class="btn border-info text-info hover:bg-info rounded-full hover:text-white">Info</button>
          <button type="button" class="btn border-light text-dark hover:bg-light hover:text-dark rounded-full">Light</button>
          <button type="button" class="btn border-dark text-dark hover:bg-dark rounded-full hover:text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Soft Buttons" isCollapsible>
        <p class="text-default-400 mb-4">
          Use the
          <code>.bg-*/15</code>
          classes to create buttons with soft, tinted background colors.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn text-primary bg-primary/15 hover:bg-primary hover:text-white">Primary</button>
          <button type="button" class="btn text-secondary bg-secondary/15 hover:bg-secondary hover:text-white">Secondary</button>
          <button type="button" class="btn text-success bg-success/15 hover:bg-success hover:text-white">Success</button>
          <button type="button" class="btn text-danger bg-danger/15 hover:bg-danger hover:text-white">Danger</button>
          <button type="button" class="btn text-warning bg-warning/15 hover:bg-warning hover:text-white">Warning</button>
          <button type="button" class="btn text-info bg-info/15 hover:bg-info hover:text-white">Info</button>
          <button type="button" class="btn text-dark bg-dark/15 hover:bg-dark hover:text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Soft Rounded Buttons" isCollapsible>
        <p class="text-default-400 mb-4">
          Combine
          <code>.bg-*/15</code>
          with
          <code>.rounded-full</code>
          to create soft, pill-shaped buttons.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn text-primary bg-primary/15 hover:bg-primary rounded-full hover:text-white">Primary</button>
          <button type="button" class="btn text-secondary bg-secondary/15 hover:bg-secondary rounded-full hover:text-white">Secondary</button>
          <button type="button" class="btn text-success bg-success/15 hover:bg-success rounded-full hover:text-white">Success</button>
          <button type="button" class="btn text-danger bg-danger/15 hover:bg-danger rounded-full hover:text-white">Danger</button>
          <button type="button" class="btn text-warning bg-warning/15 hover:bg-warning rounded-full hover:text-white">Warning</button>
          <button type="button" class="btn text-info bg-info/15 hover:bg-info rounded-full hover:text-white">Info</button>
          <button type="button" class="btn text-dark bg-dark/15 hover:bg-dark rounded-full hover:text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Ghost Buttons" isCollapsible>
        <p class="text-default-400 mb-4">Use ghost-style buttons to keep the background transparent and highlight the color on hover.</p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn text-primary hover:bg-primary rounded hover:text-white">Primary</button>
          <button type="button" class="btn text-secondary hover:bg-secondary rounded hover:text-white">Secondary</button>
          <button type="button" class="btn text-success hover:bg-success rounded hover:text-white">Success</button>
          <button type="button" class="btn text-danger hover:bg-danger rounded hover:text-white">Danger</button>
          <button type="button" class="btn text-warning hover:bg-warning rounded hover:text-white">Warning</button>
          <button type="button" class="btn text-info hover:bg-info rounded hover:text-white">Info</button>
          <button type="button" class="btn text-dark hover:bg-dark rounded hover:text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Ghost Rounded Buttons" isCollapsible>
        <p class="text-default-400 mb-4">
          Combine ghost-style buttons with
          <code>.rounded-full</code>
          to create rounded, transparent buttons that highlight on hover.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn text-primary hover:bg-primary rounded-full hover:text-white">Primary</button>
          <button type="button" class="btn text-secondary hover:bg-secondary rounded-full hover:text-white">Secondary</button>
          <button type="button" class="btn text-success hover:bg-success rounded-full hover:text-white">Success</button>
          <button type="button" class="btn text-danger hover:bg-danger rounded-full hover:text-white">Danger</button>
          <button type="button" class="btn text-warning hover:bg-warning rounded-full hover:text-white">Warning</button>
          <button type="button" class="btn text-info hover:bg-info rounded-full hover:text-white">Info</button>
          <button type="button" class="btn text-dark hover:bg-dark rounded-full hover:text-white">Dark</button>
        </div>
      </CardWithAction>

      <CardWithAction title="Gradient Buttons" isCollapsible>
        <p class="text-default-400 mb-4">Use gradient utility classes to apply smooth color transitions and create stylish gradient buttons.</p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn border-0 bg-linear-to-br from-purple-600 to-blue-500 text-white hover:bg-linear-to-bl">Purple to Blue</button>
          <button type="button" class="btn border-0 bg-linear-to-r from-cyan-500 to-blue-500 text-white hover:bg-linear-to-bl">Cyan to Blue</button>
          <button type="button" class="btn border-0 bg-linear-to-br from-green-400 to-blue-600 text-white hover:bg-linear-to-bl">Green to Blue</button>
          <button type="button" class="btn border-0 bg-linear-to-r from-purple-500 to-pink-500 text-white hover:bg-linear-to-l">Purple to Pink</button>
          <button type="button" class="btn border-0 bg-linear-to-br from-pink-500 to-orange-400 text-white hover:bg-linear-to-bl">Pink to Orange</button>
          <button type="button" class="btn border-0 bg-linear-to-r from-teal-200 to-lime-200 text-gray-900 hover:bg-linear-to-l">Teal to Lime</button>
          <button type="button" class="btn border-0 bg-linear-to-r from-red-200 via-red-300 to-yellow-200 text-gray-900 hover:bg-linear-to-bl">Red to Yellow</button>
        </div>
      </CardWithAction>

      <div class="col-span-1">
        <CardWithAction title="Gradient Rounded Buttons" isCollapsible>
          <p class="text-default-400 mb-4">
            Combine gradient utilities with
            <code>.rounded-full</code>
            to create smooth, pill-shaped buttons with blended color transitions.
          </p>

          <div class="flex flex-wrap gap-2.5">
            <button type="button" class="btn rounded-full border-0 bg-linear-to-br from-purple-600 to-blue-500 text-white hover:bg-linear-to-bl">Purple to Blue</button>
            <button type="button" class="btn rounded-full border-0 bg-linear-to-r from-cyan-500 to-blue-500 text-white hover:bg-linear-to-bl">Cyan to Blue</button>
            <button type="button" class="btn rounded-full border-0 bg-linear-to-br from-green-400 to-blue-600 text-white hover:bg-linear-to-bl">Green to Blue</button>
            <button type="button" class="btn rounded-full border-0 bg-linear-to-r from-purple-500 to-pink-500 text-white hover:bg-linear-to-l">Purple to Pink</button>
            <button type="button" class="btn rounded-full border-0 bg-linear-to-br from-pink-500 to-orange-400 text-white hover:bg-linear-to-bl">Pink to Orange</button>
            <button type="button" class="btn rounded-full border-0 bg-linear-to-r from-teal-200 to-lime-200 text-gray-900 hover:bg-linear-to-l">Teal to Lime</button>
            <button type="button" class="btn rounded-full border-0 bg-linear-to-r from-red-200 via-red-300 to-yellow-200 text-gray-900 hover:bg-linear-to-bl">Red to Yellow</button>
          </div>
        </CardWithAction>
      </div>

      <div class="col-span-1">
        <CardWithAction title="Button Sizes" isCollapsible>
          <p class="text-default-400 mb-4">
            Use
            <code>.btn-lg</code>
            or
            <code>.btn-sm</code>
            to quickly create larger or smaller button sizes.
          </p>

          <div class="flex flex-wrap items-center gap-2.5">
            <button type="button" class="btn btn-lg bg-primary hover:bg-primary-hover text-white">Large</button>
            <button type="button" class="btn bg-info hover:bg-info-hover text-white">Normal</button>
            <button type="button" class="btn btn-sm bg-success hover:bg-success-hover text-white">Small</button>
          </div>
        </CardWithAction>
      </div>

      <CardWithAction title="Disabled Buttons" isCollapsible>
        <p class="text-default-400 mb-4">
          Add the
          <code>disabled</code>
          attribute to a
          <code>&lt;button&gt;</code>
          to prevent user interaction and visually indicate an inactive state.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn bg-info text-white hover:bg-info-hover" disabled>Info</button>
          <button type="button" class="btn bg-danger text-white hover:bg-danger-hover" disabled>Danger</button>
          <button type="button" class="btn bg-dark text-white hover:bg-dark-hover" disabled>Dark</button>
        </div>
      </CardWithAction>

      <div class="col-span-1">
        <CardWithAction title="Block Button" isCollapsible>
          <p class="text-default-400 mb-4">
            Add the
            <code>.w-full</code>
            class to make buttons span the full width of their container.
          </p>

          <div class="space-y-3">
            <button type="button" class="btn bg-primary hover:bg-primary-hover w-full text-white">Block Button</button>
            <button type="button" class="btn btn-lg bg-success hover:bg-success-hover w-full text-white">Block Button</button>
          </div>
        </CardWithAction>
      </div>

      <CardWithAction title="Icon Buttons" isCollapsible>
        <p class="text-default-400 mb-4">Icon buttons let you create compact controls using only an icon, or pair an icon with text for more clarity in toolbars and action areas.</p>

        <div class="flex flex-wrap gap-2.5">
          <button type="button" class="btn btn-icon bg-primary hover:bg-primary-hover text-white">
            <Icon icon="star" class="text-lg" />
          </button>

          <button type="button" class="btn btn-icon bg-secondary hover:bg-secondary-hover text-white">
            <Icon icon="leaf" class="text-lg" />
          </button>

          <button type="button" class="btn btn-icon bg-warning hover:bg-warning-hover text-white">
            <Icon icon="settings" class="text-lg" />
          </button>

          <button type="button" class="btn btn-icon bg-info/15 text-info hover:bg-info hover:text-white">
            <Icon icon="bell" class="text-lg" />
          </button>

          <button type="button" class="btn btn-icon bg-secondary hover:bg-secondary-hover text-white">
            <Icon icon="rocket" class="text-lg" />
          </button>

          <button type="button" class="btn btn-icon border-dark text-dark hover:bg-dark rounded-full border hover:text-white">
            <Icon icon="plane" class="text-lg" />
          </button>

          <button type="button" class="btn btn-icon bg-secondary/15 text-secondary hover:bg-secondary hover:text-white">
            <Icon icon="microphone" class="text-lg" />
          </button>

          <button type="button" class="btn bg-light/60 hover:text-primary">
            <Icon icon="hand-stop" class="text-lg" />
            Stop
          </button>

          <button type="button" class="btn bg-dark text-white">
            <Icon icon="bolt" class="text-lg" />
            Boost
          </button>

          <button type="button" class="btn border-info text-info hover:bg-info border hover:text-white">
            <Icon icon="credit-card" class="text-base" />
            Payment
          </button>

          <button type="button" class="btn bg-danger hover:bg-danger-hover text-white">
            <Icon icon="tools" class="text-base" />
            Tools
          </button>
        </div>

        <div class="mt-5 flex flex-wrap gap-2.5">
          <button type="button" class="btn border-secondary text-secondary hover:bg-secondary size-7.5 border hover:text-white">
            <Icon icon="star" class="text-xs" />
          </button>

          <button type="button" class="btn bg-primary hover:bg-primary-hover size-7.5 text-white">
            <Icon icon="leaf" class="text-xs" />
          </button>

          <button type="button" class="btn bg-success hover:bg-success-hover size-7.5 rounded-full text-white">
            <Icon icon="settings" class="text-xs" />
          </button>

          <button type="button" class="btn border-secondary text-secondary hover:bg-secondary size-11.25 border hover:text-white">
            <Icon icon="bell" class="text-xl" />
          </button>

          <button type="button" class="btn bg-primary hover:bg-primary-hover size-11.25 rounded-full text-white">
            <Icon icon="rocket" class="text-xl" />
          </button>

          <button type="button" class="btn bg-success hover:bg-success-hover size-11.25 rounded-full text-white">
            <Icon icon="share" class="text-xl" />
          </button>

          <button type="button" class="btn bg-info hover:bg-info-hover size-11.25 text-white">
            <Icon icon="star" class="text-xl" />
          </button>

          <button type="button" class="btn bg-warning hover:bg-warning-hover size-11.25 text-white">
            <Icon icon="alert-octagon" class="text-xl" />
          </button>
        </div>
      </CardWithAction>

      <CardWithAction title="Button Tags" isCollapsible>
        <p class="text-default-400 mb-4">
          The
          <code>.btn</code>
          class works with
          <code>&lt;button&gt;</code>
          ,
          <code>&lt;a&gt;</code>
          , and
          <code>&lt;input&gt;</code>
          elements, though their appearance may vary slightly by browser.
        </p>

        <div class="flex flex-wrap gap-2.5">
          <a href="#" class="btn bg-primary hover:bg-primary-hover rounded text-white">Link</a>
          <button type="submit" class="btn bg-primary hover:bg-primary-hover rounded text-white">Button</button>
          <input type="button" class="btn bg-primary! hover:bg-primary-hover! rounded text-white" value="Input" />
          <input type="submit" class="btn bg-primary! hover:bg-primary-hover! rounded text-white" value="Submit" />
          <input type="reset" class="btn bg-primary! hover:bg-primary-hover! rounded text-white" value="Reset" />
        </div>
      </CardWithAction>

      <div class="col-span-1">
        <CardWithAction title="Button Group" isCollapsible>
          <p class="text-default-400 mb-4">
            Use
            <code>inline-flex</code>
            to group buttons inside a single container, allowing them to align neatly side by side or stack vertically with consistent spacing.
          </p>

          <div class="mb-3 inline-flex">
            <button type="button" class="btn bg-light hover:text-primary rounded-e-none">Left</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-none">Middle</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-s-none">Right</button>
          </div>

          <br />

          <div class="mb-3 inline-flex">
            <button type="button" class="btn bg-light hover:text-primary rounded-e-none">1</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-none">2</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-none">3</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-s-none">4</button>
          </div>
          &nbsp;
          <div class="mb-3 inline-flex">
            <button type="button" class="btn bg-light hover:text-primary rounded-e-none">5</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-none">6</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-s-none">7</button>
          </div>
          &nbsp;
          <div class="mb-3 inline-flex">
            <button type="button" class="btn bg-light hover:text-primary">8</button>
          </div>

          <br />

          <div class="mb-3 inline-flex">
            <button type="button" class="btn bg-light hover:text-primary rounded-e-none">1</button>
            <button type="button" class="btn bg-primary hover:bg-primary-hover rounded-none text-white">2</button>
            <button type="button" class="btn bg-light hover:text-primary rounded-none">3</button>

            <div class="hs-dropdown relative inline-flex">
              <button type="button" class="btn bg-light hover:text-primary rounded-s-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                Dropdown
                <Icon icon="chevron-down" />
              </button>

              <div class="hs-dropdown-menu" role="menu">
                <a class="dropdown-item" href="#">Dropdown link</a>
                <a class="dropdown-item" href="#">Dropdown link</a>
              </div>
            </div>
          </div>

          <br />

          <div class="grid grid-cols-1 md:grid-cols-4 gap-base">
            <div>
              <div class="inline-flex flex-col">
                <button type="button" class="btn bg-light hover:text-primary rounded-b-none">Top</button>
                <button type="button" class="btn bg-light hover:text-primary rounded-none">Middle</button>
                <button type="button" class="btn bg-light hover:text-primary rounded-t-none">Bottom</button>
              </div>
            </div>

            <div>
              <div class="inline-flex flex-col">
                <button type="button" class="btn bg-light hover:text-primary rounded-b-none">Button 1</button>
                <button type="button" class="btn bg-light hover:text-primary rounded-none">Button 2</button>
                <div class="hs-dropdown relative inline-flex">
                  <button type="button" class="btn bg-light hover:text-primary rounded-t-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    Button 3
                    <Icon icon="chevron-down" />
                  </button>

                  <div class="hs-dropdown-menu" role="menu">
                    <a class="dropdown-item" href="#">Dropdown link</a>
                    <a class="dropdown-item" href="#">Dropdown link</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </CardWithAction>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
