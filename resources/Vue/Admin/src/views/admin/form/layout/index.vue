<template>
  <PageBreadcrumb title="Layouts" subtitle="Forms" />
  <div class="container">
    <div class="space-y-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Form</h4>
        </div>
        <div class="card-body">
          <div class="grid grid-cols-1 items-center gap-7.5 md:grid-cols-2">
            <div class="border-b border-dashed border-default-300 pb-4 md:border-0 md:border-e md:pb-0">
              <div class="md:p-7.5">
                <h4 class="mb-1.25 text-lg font-bold uppercase">Sign in</h4>
                <p class="mb-7.5 text-default-400">Let’s get you signed in. Enter your email and password to continue.</p>
                <form>
                  <div class="mb-5">
                    <label for="userEmail" class="form-label">
                      Email address
                      <span class="text-danger">*</span>
                    </label>
                    <div>
                      <input type="email" class="form-input" id="userEmail" placeholder="you&#64;example.com" required />
                    </div>
                  </div>

                  <div class="mb-5">
                    <label for="userPassword" class="form-label">
                      Password
                      <span class="text-danger">*</span>
                    </label>
                    <div>
                      <input type="password" class="form-input" id="userPassword" placeholder="••••••••" required />
                    </div>
                  </div>

                  <div class="flex flex-wrap items-start justify-between">
                    <div class="flex items-center gap-2">
                      <input class="form-checkbox border-0" type="checkbox" id="rememberMe2" />
                      <label class="font-medium text-default-400 italic" for="rememberMe2">Keep me signed in</label>
                    </div>

                    <button class="btn rounded-full bg-primary text-white" type="submit">
                      <strong>Log in</strong>
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="text-center">
              <div class="mb-5">
                <span class="btn btn-icon size-12 rounded-full bg-secondary/15">
                  <Icon icon="user-hexagon" class="size-7 text-secondary" />
                </span>
              </div>
              <h4 class="mb-2 text-lg">Don't Have an Account Yet?</h4>
              <p class="mb-5 text-default-400">Join us today and unlock access to personalized features, updates, and more!</p>
              <RouterLink to="/auth/sign-up" class="font-semibold text-primary underline">Create Your Account</RouterLink>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Modal Form</h4>
        </div>
        <div class="card-body">
          <div class="text-center">
            <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-form" data-hs-overlay="#modal-form">Form in simple modal box</button>

            <div id="modal-form" class="hs-overlay fixed start-0 top-8 z-80 hidden size-full overflow-x-hidden overflow-y-auto opacity-0 transition-all hs-overlay-open:opacity-100 hs-overlay-open:duration-500" role="dialog" tabindex="-1" aria-labelledby="modal-form-label">
              <div class="hs-overlay-animation-target mx-auto w-xs md:w-2xl lg:w-3xl">
                <div class="card">
                  <div class="card-body">
                    <div class="grid grid-cols-1 items-center gap-7.5 md:grid-cols-2">
                      <div class="border-b border-dashed border-default-300 pb-4 md:border-0 md:border-e md:pb-0">
                        <div class="text-start md:p-7.5">
                          <h4 class="mb-1.25 text-lg font-bold uppercase">Sign in</h4>
                          <p class="mb-7.5 text-default-400">Let’s get you signed in. Enter your email and password to continue.</p>
                          <form>
                            <div class="mb-5">
                              <label for="userEmail" class="form-label">
                                Email address
                                <span class="text-danger">*</span>
                              </label>
                              <div>
                                <input type="email" class="form-input" id="userEmail" placeholder="you&#64;example.com" required />
                              </div>
                            </div>

                            <div class="mb-5">
                              <label for="userPassword" class="form-label">
                                Password
                                <span class="text-danger">*</span>
                              </label>
                              <div>
                                <input type="password" class="form-input" id="userPassword" placeholder="••••••••" required />
                              </div>
                            </div>

                            <div class="flex flex-wrap items-start justify-between">
                              <div class="flex items-center gap-2">
                                <input class="form-checkbox border-0" type="checkbox" id="rememberMe1" />
                                <label class="font-medium text-default-400 italic" for="rememberMe1">Keep me signed in</label>
                              </div>

                              <button class="btn rounded-full bg-primary text-white hover:bg-primary-hover" type="submit">
                                <strong>Log in</strong>
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class="text-center">
                        <div class="mb-5">
                          <span class="btn btn-icon size-12 rounded-full bg-secondary/15">
                            <Icon icon="user-hexagon" class="size-7 text-secondary" />
                          </span>
                        </div>
                        <h4 class="mb-2 text-lg">Don't Have an Account Yet?</h4>
                        <p class="mb-5 text-default-400">Join us today and unlock access to personalized features, updates, and more!</p>
                        <RouterLink to="/auth/sign-up" class="font-semibold text-primary underline">Create Your Account</RouterLink>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Example</h4>
        </div>
        <div class="card-body">
          <form class="space-y-6">
            <div>
              <label for="exampleInputEmail1" class="form-label"> Email address </label>
              <div>
                <input type="email" class="form-input" id="exampleInputEmail1" placeholder="Enter email" required />
              </div>
              <small id="emailHelp" class="text-xs text-default-400">We'll never share your email with anyone else.</small>
            </div>

            <div>
              <label for="exampleInputPassword1" class="form-label"> Password </label>
              <div>
                <input type="password" class="form-input" id="exampleInputPassword1" placeholder="Password" required />
              </div>
            </div>

            <div class="flex items-center gap-2">
              <input class="form-checkbox border-0" type="checkbox" id="checkmeout0" />
              <label class="font-medium text-default-600" for="checkmeout0">Check me out !</label>
            </div>

            <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">
              <strong>Submit</strong>
            </button>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Horizontal Form</h4>
        </div>
        <div class="card-body">
          <form class="space-y-6">
            <div class="grid md:grid-cols-4">
              <div>
                <label for="inputEmail3" class="form-label"> Email </label>
              </div>
              <div class="md:col-span-3">
                <input type="email" class="form-input" id="inputEmail3" placeholder="Email" required />
              </div>
            </div>

            <div class="grid md:grid-cols-4">
              <div>
                <label for="inputPassword3" class="form-label"> Password </label>
              </div>
              <div class="md:col-span-3">
                <input type="password" class="form-input" id="inputPassword3" placeholder="Password" required />
              </div>
            </div>

            <div class="grid md:grid-cols-4">
              <div>
                <label for="inputPassword5" class="form-label"> Re Password </label>
              </div>
              <div class="md:col-span-3">
                <input type="password" class="form-input" id="inputPassword5" placeholder="Retype Password" required />
              </div>
            </div>

            <div class="grid md:grid-cols-4">
              <div class="md:col-span-3 md:col-start-2">
                <div class="flex items-center gap-2">
                  <input class="form-checkbox" type="checkbox" id="checkmeout" />
                  <label class="font-medium text-default-600" for="checkmeout">Check me out !</label>
                </div>
              </div>
            </div>

            <div class="grid md:grid-cols-4">
              <div class="md:col-span-3 md:col-start-2">
                <button class="btn bg-info text-white hover:bg-info-hover" type="submit">
                  <strong>Sign in</strong>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Horizontal Form Label Sizing</h4>
        </div>
        <div class="card-body">
          <form class="space-y-6">
            <div class="grid md:grid-cols-6">
              <div>
                <label for="colFormLabelSm" class="mb-2 block text-xs"> Email </label>
              </div>
              <div class="md:col-span-5">
                <input type="email" class="form-input-sm form-input" id="colFormLabelSm" placeholder="col-form-label-sm" required />
              </div>
            </div>

            <div class="grid md:grid-cols-6">
              <div>
                <label for="colFormLabel" class="form-label"> Email </label>
              </div>
              <div class="md:col-span-5">
                <input type="email" class="form-input" id="colFormLabel" placeholder="col-form-label" required />
              </div>
            </div>

            <div class="grid md:grid-cols-6">
              <div>
                <label for="colFormLabelLg" class="mb-2 block text-base"> Email </label>
              </div>
              <div class="md:col-span-5">
                <input type="email" class="form-input h-12! text-base!" id="colFormLabelLg" placeholder="col-form-label-lg" required />
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Inline Form</h4>
        </div>
        <div class="card-body">
          <form class="mb-5 grid items-center gap-3 md:grid-cols-1 lg:grid-cols-2">
            <div class="flex flex-wrap items-center gap-6">
              <div>
                <label for="staticEmail2" class="sr-only hidden">Password</label>
                <input type="text" id="staticEmail2" value="email&#64;example.com" readonly class="border-0 bg-transparent text-sm text-default-700 focus:ring-0" />
              </div>

              <div>
                <label for="inputPassword2" class="sr-only hidden">Password</label>
                <input type="password" id="inputPassword2" placeholder="Password" class="form-input" />
              </div>

              <div>
                <button type="submit" class="btn bg-primary text-white hover:bg-primary-hover">Confirm identity</button>
              </div>
            </div>
          </form>
          <h6 class="mb-2 text-base">Auto-sizing</h6>
          <form>
            <div class="grid items-center gap-2 md:grid-cols-1 lg:grid-cols-3">
              <div class="flex flex-wrap items-center gap-4 lg:col-span-2">
                <div>
                  <label class="hidden" for="inlineFormInput">Name</label>
                  <input type="text" class="form-input" id="inlineFormInput" placeholder="Jane Doe" />
                </div>
                <div>
                  <label class="hidden" for="inlineFormInputGroup">Username</label>
                  <div class="flex">
                    <span class="inline-flex items-center rounded-s-md border border-default-300 bg-default-100 px-3 text-sm text-default-600">&#64;</span>
                    <input type="text" class="form-input rounded-s-none!" id="inlineFormInputGroup" placeholder="Username" />
                  </div>
                </div>
                <div>
                  <div class="flex items-center gap-2">
                    <input class="form-checkbox" type="checkbox" id="autoSizingCheck" />
                    <label class="font-medium text-default-600" for="autoSizingCheck">Check me out !</label>
                  </div>
                </div>
                <div>
                  <button type="submit" class="btn bg-primary text-white hover:bg-primary-hover">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form Row</h4>
        </div>
        <div class="card-body">
          <form>
            <div class="grid gap-base md:grid-cols-6">
              <div class="md:col-span-3">
                <label for="inputEmail4" class="form-label"> Email </label>
                <div>
                  <input type="email" class="form-input" id="inputEmail4" placeholder="Email" required />
                </div>
              </div>

              <div class="md:col-span-3">
                <label for="inputPassword4" class="form-label"> Password </label>
                <div>
                  <input type="password" class="form-input" id="inputPassword4" placeholder="Password" required />
                </div>
              </div>

              <div class="md:col-span-6">
                <label for="inputAddress" class="form-label"> Address </label>
                <div>
                  <input type="text" class="form-input" id="inputAddress" placeholder="1234 Main St" required />
                </div>
              </div>

              <div class="md:col-span-6">
                <label for="inputAddress2" class="form-label"> Address 2 </label>
                <div>
                  <input type="text" class="form-input" id="inputAddress2" placeholder="Apartment, studio, or floor" required />
                </div>
              </div>

              <div class="md:col-span-3">
                <label for="inputCity" class="form-label"> City </label>
                <div>
                  <input type="text" class="form-input" id="inputCity" required />
                </div>
              </div>

              <div class="md:col-span-2">
                <label for="inputState" class="form-label"> City </label>
                <select id="inputState" class="form-input">
                  <option>Choose</option>
                  <option>Option 1</option>
                  <option>Option 2</option>
                  <option>Option 3</option>
                </select>
              </div>

              <div class="md:col-span-1">
                <label for="inputZip" class="form-label"> Zip </label>
                <div>
                  <input type="text" class="form-input" id="inputZip" required />
                </div>
              </div>

              <div class="md:col-span-6">
                <div class="mb-3 flex items-center gap-2">
                  <input class="form-checkbox border-0" type="checkbox" id="customCheck11" />
                  <label class="font-medium text-default-600" for="customCheck11">Check this custom checkbox</label>
                </div>

                <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">
                  <strong>Sign in</strong>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Floating Labels</h4>
        </div>
        <div class="card-body">
          <form>
            <div class="grid gap-base md:grid-cols-6">
              <div class="md:col-span-3">
                <div class="relative">
                  <input type="text" id="usernameInput" placeholder="" class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" />
                  <label
                    for="usernameInput"
                    class="absolute top-2 left-3 text-sm text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Username</label
                  >
                </div>
              </div>

              <div class="md:col-span-3">
                <div class="relative">
                  <input type="text" id="fullnameInput" placeholder="" class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" />
                  <label
                    for="fullnameInput"
                    class="absolute top-2 left-3 text-sm text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Full Name</label
                  >
                </div>
              </div>

              <div class="md:col-span-2">
                <div class="relative">
                  <input type="text" id="phoneInput" placeholder="" class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" />
                  <label
                    for="phoneInput"
                    class="absolute top-2 left-3 text-sm text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Phone Number</label
                  >
                </div>
              </div>

              <div class="md:col-span-2">
                <div class="relative">
                  <input type="date" id="dobInput" placeholder="" class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" />
                  <label
                    for="dobInput"
                    class="absolute top-2 left-3 text-xs text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Date of Birth</label
                  >
                </div>
              </div>

              <div class="md:col-span-2">
                <div class="relative">
                  <select class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" id="genderSelect" aria-label="Select gender">
                    <option selected>Choose...</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                  </select>
                  <label
                    for="genderSelect"
                    class="absolute top-2 left-3 text-xs text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Gender</label
                  >
                </div>
              </div>

              <div class="md:col-span-4">
                <div class="relative">
                  <input type="text" id="addressInput" placeholder="" class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" />
                  <label
                    for="addressInput"
                    class="absolute top-2 left-3 text-sm text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Street Address</label
                  >
                </div>
              </div>

              <div class="md:col-span-2">
                <div class="relative">
                  <select class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" id="stateSelect" aria-label="Select state">
                    <option selected>Choose...</option>
                    <option value="1">California</option>
                    <option value="2">Texas</option>
                    <option value="3">Florida</option>
                  </select>
                  <label
                    for="stateSelect"
                    class="absolute top-2 left-3 text-xs text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >State</label
                  >
                </div>
              </div>

              <div class="md:col-span-3">
                <div class="relative">
                  <input type="text" id="websiteInput" placeholder="" class="peer block w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300" />
                  <label
                    for="websiteInput"
                    class="absolute top-2 left-3 text-sm text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Website (optional)</label
                  >
                </div>
              </div>

              <div class="md:col-span-3">
                <div class="relative">
                  <textarea id="bioTextarea" placeholder="" class="peer block h-25 w-full rounded border border-default-300 bg-card px-3 pt-5 pb-2 text-base focus:border-0 focus:ring focus:ring-default-300"></textarea>
                  <label
                    for="bioTextarea"
                    class="absolute top-2 left-3 bg-card text-sm text-default-500 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-default-400 peer-focus:top-1.5 peer-focus:border-0 peer-focus:text-xs peer-focus:ring-0"
                    >Short Bio</label
                  >
                </div>
              </div>

              <div class="md:col-span-6">
                <button class="btn bg-success text-white hover:bg-success-hover" type="submit">
                  <strong>Create Account</strong>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
