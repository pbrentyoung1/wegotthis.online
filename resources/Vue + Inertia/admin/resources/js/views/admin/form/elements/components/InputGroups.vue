<template>
  <BCard no-body>
    <BCardHeader>
      <BCardTitle>Input Group</BCardTitle>
    </BCardHeader>
    <BCardBody>
      <!-- Basic Input Group -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Username</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">&#64;</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Email-like Input Group -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Recipient</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" />
            <span class="input-group-text" id="basic-addon2">&#64;example.com</span>
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Currency Input Group -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Amount</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" />
            <span class="input-group-text">.00</span>
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Multi-field Input Group -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Email Login</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" />
            <span class="input-group-text">&#64;</span>
            <input type="text" class="form-control" placeholder="Server" aria-label="Server" />
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Textarea with Input Group -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Textarea</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea class="form-control" aria-label="With textarea" rows="2"></textarea>
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Vanity URL Input Group -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label for="basic-url" class="col-form-label">Vanity URL</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" />
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Flex-nowrap Input Group -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Wrapping</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">&#64;</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" />
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Input group with dropdown and text input -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Dropdown + Input</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="!#">Action</a>
              <a class="dropdown-item" href="!#">Another action</a>
              <a class="dropdown-item" href="!#">Something else here</a>
            </div>
            <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" />
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Input group with text input and button -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label class="col-form-label">Input + Button</label>
        </BCol>
        <BCol lg="5">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" />
            <button class="btn btn-dark" type="button">Button</button>
          </div>
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- File input + Multiple file input -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label for="inputGroupFile04" class="col-form-label">File Input</label>
        </BCol>
        <BCol lg="5">
          <input class="form-control" type="file" id="inputGroupFile04" />
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label for="formFileMultiple01" class="col-form-label">Multiple Files</label>
        </BCol>
        <BCol lg="5">
          <input class="form-control" type="file" id="formFileMultiple01" multiple />
        </BCol>
      </BRow>

      <div class="border-top border-dashed my-3"></div>

      <!-- Input Group Select -->
      <BRow class="g-lg-4 g-2">
        <BCol lg="2">
          <label for="inputGroupSelect01" class="col-form-label">Input Group Select</label>
        </BCol>
        <BCol lg="5">
          <BInputGroup>
            <BInputGroupText class="input-group-text" for="inputGroupSelect01">Options</BInputGroupText>
            <BFormSelect id="inputGroupSelect01">
              <option selected>Choose...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </BFormSelect>
          </BInputGroup>
        </BCol>
      </BRow>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { BCol, BFormSelect, BInputGroup, BInputGroupText, BRow } from 'bootstrap-vue-next'
</script>
