<?php snippet('header') ?>

<!-- CONTACT PAGE -->
<h1 class="title"><?= $page->title()->html() ?></h1>

<div id="post" class="post-content">
  <p>Get in touch through any of these channels:</p>
  
  <ul>
    <li><span class="tag">[EM]</span><a href="mailto:hello@example.com">hello@example.com</a></li>
    <li><span class="tag">[GH]</span><a href="https://github.com/chrisgwynne">github.com/chrisgwynne</a></li>
    <li><span class="tag">[TW]</span><a href="https://twitter.com/chrisgwynne">@chrisgwynne</a></li>
  </ul>
  
  <p>Or use the form below:</p>
  
  <?php if ($success): ?>
    <p class="notification">Thank you! Your message has been sent.</p>
  <?php else: ?>
    <?php if (isset($error) && $error): ?>
      <p class="notification">Please fill in all fields correctly.</p>
    <?php endif ?>
    
    <form method="post" action="<?= $page->url() ?>">
      <div class="mb-4">
        <label for="name" class="block mb-2">Name:</label>
        <input type="text" id="name" name="name" class="bg-node-code border border-node-border p-2 w-full text-white font-mono" required>
      </div>
      
      <div class="mb-4">
        <label for="email" class="block mb-2">Email:</label>
        <input type="email" id="email" name="email" class="bg-node-code border border-node-border p-2 w-full text-white font-mono" required>
      </div>
      
      <div class="mb-4">
        <label for="message" class="block mb-2">Message:</label>
        <textarea id="message" name="message" rows="5" class="bg-node-code border border-node-border p-2 w-full text-white font-mono" required></textarea>
      </div>
      
      <button type="submit" class="bg-white text-node-bg px-4 py-2 font-mono hover:bg-gray-200">Send</button>
    </form>
  <?php endif ?>
</div>

<?php snippet('footer') ?>
