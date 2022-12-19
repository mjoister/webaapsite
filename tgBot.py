import os
import telebot
from telebot import types
from dotenv import load_dotenv

load_dotenv()
API_KEY = os.getenv('5342280634:AAENNxcr7iSb6VGEIPSKpdOYfh8vKgi0b-c')
STORE_URL = os.getenv('STORE_URL')
bot = telebot.TeleBot(API_KEY)

markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
itembtn1 = types.KeyboardButton(text='Заказать полезную еду!', web_app=types.WebAppInfo(url=STORE_URL))
markup.add(itembtn1)

# markup = types.InlineKeyboardMarkup()
# itembtn1 = types.InlineKeyboardButton('Text',web_app=types.WebAppInfo(url=''))
# markup.add(itembtn1)

# markupmenu = types.MenuButtonCommands()
# menubtn1= types.MenuButton()

@bot.message_handler(commands=['start'])
@bot.message_handler(content_types=['text'])
def start(message):
    bot.send_message(message.chat.id, 'Заказываем?', reply_markup=markup)
    print(message)


@bot.message_handler(commands=['chatid'])
def chatid(message):
    print(message)
    bot.reply_to(message, 'Your chat id is: ' + str(message.chat.id))


print('Telegram bot starting...')

bot.infinity_polling()
