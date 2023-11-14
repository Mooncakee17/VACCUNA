
<?php include('../templates/Header.php'); ?>
<link rel="stylesheet" href="./css/style6.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<body>
<div class="container1">
        <div class="column1">
            
          <?php include('../templates/Parent-Dash.php'); ?> <!------------call side bar template------------>
        </div>

        <div class="column">
            <!-- Chats container -->
            <div class="chat-container"></div>
    
            <!-- Typing container -->
            <div class="typing-container">
                <div class="typing-content">
                    <div class="typing-textarea">
                        <textarea id="chat-input" spellcheck="false" placeholder="Ask your question here" required></textarea>
                        <span id="send-btn" class="material-symbols-rounded">send</span>
                    </div>
                    <div class="typing-controls">
                        <span id="theme-btn" class="material-symbols-rounded">light_mode</span>
                        <span id="delete-btn" class="material-symbols-rounded">delete</span>
                </div>
            </div>
        </div>
</div>
    <script src="./js/index.js"></script>
    <script src="./js/VACCUNA AI Chatbot.js"></script>

</body>
</html>