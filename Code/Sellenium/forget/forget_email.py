import unittest

from selenium import webdriver


# assume captcha is 1234

class Forget(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_forgot_email(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/forget")
        email_check = driver.find_element_by_id("email-check")
        email = driver.find_element_by_id("email")
        phone_number = driver.find_element_by_id("phone-number")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")
        email_check.click()
        phone_number.send_keys("09398604014")
        email.send_keys("smjfagmail.com")
        captcha.send_keys("1234")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
