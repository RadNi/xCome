import unittest

from selenium import webdriver
from test_utility import static_data, fields


# Assume captcha is 1234

class Forget(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_forget_telegram(self):
        driver = self.driver
        driver.get(static_data.base_url + "forget")
        components = fields.get_components_by_name(driver, ["telegram-check", "phone-number=09398604014",
                                                            "email=smjfas@gmail.com", "captcha=1234", "submit"])
        components[0].click()
        components[4].click()

        assert driver.find_element_by_id("successful") is not None

    def test_forget_sms(self):
        driver = self.driver
        driver.get(static_data.base_url + "forget")
        components = fields.get_components_by_name(driver, ["sms-check", "phone-number=09398604014",
                                                            "email=smjfas@gmail.com", "captcha=1234", "submit"])
        components[0].click()
        components[4].click()

        assert driver.find_element_by_id("successful") is not None

    def test_forget_email(self):
        driver = self.driver
        driver.get(static_data.base_url + "forget")
        components = fields.get_components_by_name(driver, ["email-check", "phone-number=09398604014",
                                                            "email=smjfas@gmail.com", "captcha=1234", "submit"])
        components[0].click()
        components[4].click()

        assert driver.find_element_by_id("successful") is not None

    def tearDown(self):
        self.driver.close()
