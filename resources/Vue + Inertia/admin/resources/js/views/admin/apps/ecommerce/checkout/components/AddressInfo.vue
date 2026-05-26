<template>
  <div>
    <h5 class="my-1 fs-md">Saved Address</h5>
    <p class="text-muted fs-sm mb-4">Provide your address details to receive the order invoice.</p>

    <BRow>
      <BCol xl="6">
        <div class="mb-3">
          <div class="form-check card-radio card-radio-bordered">
            <input class="form-check-input" type="radio" name="deli-address" id="add-home" checked />
            <label class="form-check-label p-3 w-100" for="add-home">
              <span class="fw-bold text-muted mb-1 d-block text-uppercase"> Home </span>
              <span class="fw-semibold d-block">Evelyn Carter</span>
              2418 Maple Street, Apt 12B<br />
              Brooklyn, NY 11215<br />
              <abbr title="Phone">P:</abbr> (917) 432-7784 <br />
            </label>
          </div>
        </div>
      </BCol>
      <BCol xl="6">
        <div class="mb-3">
          <div class="form-check card-radio card-radio-bordered">
            <input class="form-check-input" type="radio" name="deli-address" id="add-office" />
            <label class="form-check-label p-3 w-100" for="add-office">
              <span class="fw-bold text-muted mb-1 d-block text-uppercase"> Office </span>
              <span class="fw-semibold d-block">Marcus Reynolds</span>
              500 Howard Street, Floor 8<br />
              San Francisco, CA 94105<br />
              <abbr title="Phone">P:</abbr> (415) 392-6400 <br />
            </label>
          </div>
        </div>
      </BCol>
    </BRow>

    <h5 class="my-1 fs-md">Add New Address</h5>
    <p class="text-muted fs-sm mb-4">Provide your address details to receive the order invoice.</p>

    <BForm>
      <BRow>
        <BCol md="6">
          <BFormGroup label="First Name" label-for="shipping-add-first-name" class="mb-3">
            <BFormInput id="shipping-add-first-name" type="text" placeholder="Enter your first name" class="form-control" />
          </BFormGroup>
        </BCol>
        <BCol md="6">
          <BFormGroup label="Last Name" label-for="shipping-add-last-name" class="mb-3">
            <BFormInput id="shipping-add-last-name" type="text" placeholder="Enter your last name" class="form-control" />
          </BFormGroup>
        </BCol>
      </BRow>

      <BRow>
        <BCol md="6">
          <BFormGroup label="Email*" label-for="shipping-add-email-address" class="mb-3">
            <BFormInput id="shipping-add-email-address" type="email" placeholder="Enter your email" class="form-control" />
          </BFormGroup>
        </BCol>
        <BCol md="6">
          <BFormGroup label="Phone*" label-for="shipping-add-phone" class="mb-3">
            <MaskInput v-model="phoneWithArea" mask="(##) ###-####-###" class="form-control" placeholder="(xx) xxx xxxx xxx" />
          </BFormGroup>
        </BCol>
      </BRow>

      <BRow>
        <BCol cols="12">
          <BFormGroup label="Address*" label-for="shipping-add-address" class="mb-3">
            <BFormTextarea id="shipping-add-address" rows="2" placeholder="Enter your address" class="form-control" />
          </BFormGroup>
        </BCol>
      </BRow>

      <BRow>
        <BCol md="4">
          <BFormGroup label="Town / City" label-for="shipping-add-town-city" class="mb-3">
            <BFormInput id="shipping-add-town-city" type="text" placeholder="Enter your city name" class="form-control" />
          </BFormGroup>
        </BCol>
        <BCol md="4">
          <BFormGroup label="State" label-for="shipping-add-state" class="mb-3">
            <BFormInput id="shipping-add-state" type="text" placeholder="Enter your state" class="form-control" />
          </BFormGroup>
        </BCol>
        <BCol md="4">
          <BFormGroup label="Zip / Postal Code" label-for="shipping-add-zip-postal" class="mb-3">
            <MaskInput v-model="zip" mask="#####-###" class="form-control" placeholder="Enter your zip code" />
          </BFormGroup>
        </BCol>
      </BRow>

      <BRow>
        <BCol cols="12">
          <BFormGroup label="Country" class="mb-3">
            <BFormSelect class="form-select">
              <option value="0">Select Country</option>
              <option value="AF">Afghanistan</option>
              <option value="AL">Albania</option>
              <option value="BF">Burkina Faso</option>
              <option value="BI">Burundi</option>
              <option value="KH">Cambodia</option>
              <option value="CM">Cameroon</option>
              <option value="CA">Canada</option>
              <option value="KM">Comoros</option>
              <option value="CG">Congo</option>
              <option value="CK">Cook Islands</option>
              <option value="CR">Costa Rica</option>
              <option value="CI">Cote d'Ivoire</option>
              <option value="HR">Croatia (Hrvatska)</option>
              <option value="CU">Cuba</option>
              <option value="CY">Cyprus</option>
              <option value="CZ">Czech Republic</option>
              <option value="DM">Dominica</option>
              <option value="DO">Dominican Republic</option>
              <option value="EC">Ecuador</option>
              <option value="EG">Egypt</option>
              <option value="FK">Falkland Islands (Malvinas)</option>
              <option value="FO">Faroe Islands</option>
              <option value="FJ">Fiji</option>
              <option value="FI">Finland</option>
              <option value="FR">France</option>
              <option value="GA">Gabon</option>
              <option value="GP">Guadeloupe</option>
              <option value="GU">Guam</option>
              <option value="HT">Haiti</option>
              <option value="HN">Honduras</option>
              <option value="HK">Hong Kong</option>
              <option value="HU">Hungary</option>
              <option value="IS">Iceland</option>
              <option value="IN">India</option>
              <option value="ID">Indonesia</option>
              <option value="IQ">Iraq</option>
              <option value="IE">Ireland</option>
              <option value="IL">Israel</option>
              <option value="IT">Italy</option>
            </BFormSelect>
          </BFormGroup>
        </BCol>
      </BRow>

      <div class="d-flex justify-content-end">
        <BButton variant="success" size="sm" type="button">Save</BButton>
      </div>
    </BForm>

    <h5 class="my-1 fs-md mt-4">Shipping Method</h5>
    <p class="text-muted fs-sm mb-3">Choose your preferred shipping method to receive your order on time.</p>

    <BRow>
      <BCol md="6">
        <div class="border p-3 rounded mb-3 mb-md-0">
          <div class="form-check">
            <input type="radio" id="shippingMethodRadio1" name="shippingOptions" class="form-check-input" checked />
            <label class="form-check-label font-16 fw-bold" for="shippingMethodRadio1">Standard Delivery - FREE</label>
          </div>
          <p class="mb-0 ps-3 pt-1 text-muted">Estimated 5-7 days shipping (Duties and tax may be due upon delivery)</p>
        </div>
      </BCol>
      <BCol md="6">
        <div class="border p-3 rounded">
          <div class="form-check">
            <input type="radio" id="shippingMethodRadio2" name="shippingOptions" class="form-check-input" />
            <label class="form-check-label font-16 fw-bold" for="shippingMethodRadio2">Fast Delivery - $25</label>
          </div>
          <p class="mb-0 ps-3 pt-1 text-muted">Estimated 1-2 days shipping (Duties and tax may be due upon delivery)</p>
        </div>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { MaskInput } from 'vue-mask-next'
const phoneWithArea = ref('')
const zip = ref('')
</script>
<style scoped></style>
