import unittest

from selenium import webdriver
from test_utility import fields, static_data


class Contact(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_empty_message(self):
        driver = self.driver
        driver.get(static_data.base_url + "contact")
        fields.get_components_by_name(driver, ["name=smj", "family=feyz", "username=smjfas",
                                               "email=smjfs@gmail.com", "cellphone=09398604014",
                                               "captcha=1234",
                                               "submit"])[6].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_captcha(self):
        driver = self.driver
        driver.get(static_data.base_url + "contact")
        fields.get_components_by_name(driver, ["name=smj", "family=feyz", "username=smjfas",
                                               "email=smjfas@gmail.com", "cellphone=09398604014",
                                               "message=this is a test.",
                                               "submit"])[6].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
