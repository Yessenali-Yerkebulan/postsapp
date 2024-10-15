import './bootstrap';
import Search from "@/live-search.js";
import Chat from "@/chat.js";

if(document.querySelector(".header-search-icon")) {
    new Search();
}

if(document.querySelector(".header-chat-icon")) {
    new Chat();
}
