import unittest

from selenium import webdriver
from test_utility import fields, static_data


class Contact(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_sql_injection(self):
        driver = self.driver
        driver.get(static_data.base_url + "contact")
        fields.get_components_by_name(driver, ["name=smj", "family=select * from users", "username=smjfas",
                                               "email=smjfas@gmail.com", "cellphone=09398604014",
                                               "message=this is a test.", "captcha=1234",
                                               "submit"])[7].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
