import time
import unittest

from selenium import webdriver

from test_utility import static_data


class Clerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_clerk_verification_accept(self):
        driver = self.driver
        driver.get(static_data.base_url + "clerk/profile")
        transactions = driver.find_element_by_id("unchecked-trans-table").find_elements_by_tag_name('tr')
        for i in range(1, len(transactions), 2):
            transactions[i].find_element_by_class_name("mark").find_element_by_tag_name('input').click()

        time.sleep(2)
        driver.find_element_by_id("accept-but").click()

        assert driver.find_element_by_id("successful") is not None

    def test_clerk_verification_reject(self):
        driver = self.driver
        driver.get(static_data.base_url + "clerk/profile")
        transactions = driver.find_element_by_id("unchecked-trans-table").find_elements_by_tag_name('tr')
        for i in range(2, len(transactions), 2):
            transactions[i].find_element_by_class_name("mark").find_element_by_tag_name('input').click()

        driver.find_element_by_id("reject-but").click()

        assert driver.find_element_by_id("successful") is not None

    def tearDown(self):
        self.driver.close()
