import unittest

from selenium import webdriver
from test_utility import fields, static_data


# Assume captcha is 1234

class Forget(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_forget_empty_phone(self):
        driver = self.driver
        driver.get(static_data.base_url + "forget")
        components = fields.get_components_by_name(driver, ["telegram-check",
                                                            "email=smjfas@gmail.com", "captcha=1234", "submit"])
        components[0].click()
        components[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_forget_empty_email(self):
        driver = self.driver
        driver.get(static_data.base_url + "forget")
        components = fields.get_components_by_name(driver, ["telegram-check", "phone-number=09398604014",
                                                            "captcha=1234", "submit"])
        components[0].click()
        components[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_forget_empty_captcha(self):
        driver = self.driver
        driver.get(static_data.base_url + "forget")
        components = fields.get_components_by_name(driver, ["telegram-check", "phone-number=09398604014",
                                                            "email=smjfas@gmail.com", "submit"])
        components[0].click()
        components[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_forget_empty_checkbox(self):
        driver = self.driver
        driver.get(static_data.base_url + "forget")
        components = fields.get_components_by_name(driver, ["phone-number=09398604014",
                                                            "email=smjfas@gmail.com", "captcha=1234", "submit"])
        components[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
