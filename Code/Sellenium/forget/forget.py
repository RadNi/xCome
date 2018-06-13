import unittest

from selenium import webdriver


# assume captcha is 1234

class Forget(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_forgot_telegram(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/forget")
        telegram_check = driver.find_element_by_id("telegram-check")
        phone_number = driver.find_element_by_id("phone-number")
        email = driver.find_element_by_id("email")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")
        telegram_check.click()
        phone_number.send_keys("09398604014")
        email.send_keys("smjfas@gmail.com")
        captcha.send_keys("1234")
        submit.click()

        assert driver.find_element_by_id("accept") is not None

    def test_forgot_sms(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/forget")
        sms_check = driver.find_element_by_id("sms-check")
        phone_number = driver.find_element_by_id("phone-number")
        email = driver.find_element_by_id("email")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")
        sms_check.click()
        phone_number.send_keys("09398604014")
        email.send_keys("smjfas@gmail.com")
        captcha.send_keys("1234")
        submit.click()

        assert driver.find_element_by_id("accept") is not None

    def test_forgot_email(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/forget")
        email_check = driver.find_element_by_id("email-check")
        phone_number = driver.find_element_by_id("phone-number")
        email = driver.find_element_by_id("email")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")
        email_check.click()
        phone_number.send_keys("09398604014")
        email.send_keys("smjfas@gmail.com")
        captcha.send_keys("1234")
        submit.click()

        assert driver.find_element_by_id("accept") is not None

    def tearDown(self):
        self.driver.close()
