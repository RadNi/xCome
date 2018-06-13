import unittest
from selenium import webdriver
from test_utility import static_data, fields


# Assume captcha is 1234

class Contact(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_contact_phone_length(self):
        driver = self.driver
        driver.get(static_data.base_url + "contact")
        fields.get_components_by_name(driver, ["name=smj", "family=feyz", "username=smjfas",
                                                            "email=smjfas@gmail.com", "cellphone=093986040214",
                                                            "message=this is a test.", "captcha=1234",
                                                            "submit"])[7].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_contact_phone_character(self):
        driver = self.driver
        driver.get(static_data.base_url + "contact")
        fields.get_components_by_name(driver, ["name=smj", "family=feyz", "username=smjfas",
                                               "email=smjfas@gmail.com", "cellphone=093s86040214",
                                               "message=this is a test.", "captcha=1234",
                                               "submit"])[7].click()
        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
