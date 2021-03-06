import unittest

from selenium import webdriver
from test_utility import fields, static_data


# Assume captcha is 1234

class Criticism(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_criticism_long_phone_num(self):
        driver = self.driver
        driver.get(static_data.base_url + "criticism")
        fields.get_components_by_name(driver, ["name=smj", "family=fas", "email=smjfas@gmail.com",
                                               "message_topic=test", "message_body=This is a test message",
                                               "phonenumber=09222398604014", "captcha=1234", "submit"])[7].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_criticism_short_phone_num(self):
        driver = self.driver
        driver.get(static_data.base_url + "criticism")
        fields.get_components_by_name(driver, ["name=smj", "family=fas", "email=smjfas@gmail.com",
                                               "message_topic=test", "message_body=This is a test message",
                                               "phonenumber=094014", "captcha=1234", "submit"])[7].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_criticism_character_phone_num(self):
        driver = self.driver
        driver.get(static_data.base_url + "criticism")
        fields.get_components_by_name(driver, ["name=smj", "family=fas", "email=smjfas@gmail.com",
                                               "message_topic=test", "message_body=This is a test message",
                                               "phonenumber=093t8uusfsd", "captcha=1234", "submit"])[7].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
